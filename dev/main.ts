// Promise polyfill
import 'es6-promise/auto';

import {Query as q} from 'typeQuery/query/query';
import { Init } from 'typeQuery/core/init';
import {_App} from 'typeQuery/core/decorators/app.decorator';

// import main styles
import './styles/main.scss';

@_App({
    mixins: [],
})
class App {
    onInit(): void {
        console.log('Hello world 1');
    }

}

Init(App);





