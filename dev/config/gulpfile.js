'use strict';

var gulp = require('gulp');  
var gutil = require( 'gulp-util' );  
var ftp = require( 'vinyl-ftp' );

/** Configuration **/
var user = "";  
var password = "";  
var host = '';  
var port = 21;  
var localFilesGlob = [
    '../../assets/**',
    '../../inc/**',
    '../../template-parts/**',
    '../../templates/**',
    '../../*.php',
];  
var remoteFolder = '/blog/wp-content/themes/rwp/'


function getFtpConnection() {  
    return ftp.create({
        host: host,
        port: port,
        user: user,
        password: password,
        parallel: 5,
		log: gutil.log,
		secure: false
    });
}


gulp.task('ftp-deploy', function() {

    var conn = getFtpConnection();

    return gulp.src(localFilesGlob, { base: '.', buffer: false })
        .pipe( conn.newer( remoteFolder ) ) // only upload newer files 
        .pipe( conn.dest( remoteFolder ) )
    ;
});

gulp.task('ftp-deploy-watch', function() {
    var conn = getFtpConnection();

    gulp.watch(localFilesGlob)
    .on('change', function(event) {
      console.log('Changes detected! Uploading file "' + event.path + '", ' + event.type);

      return gulp.src( [event.path], { base: '.', buffer: false } )
        .pipe( conn.newer( remoteFolder ) ) // only upload newer files 
        .pipe( conn.dest( remoteFolder ) )
      ;
    });
});