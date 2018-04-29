import React from 'react';
import {render} from 'react-dom';
import App from './components/app';
import storeFactory from './store/index.js';


const store = storeFactory();

render(
    <App store={store}/>, document.getElementById('container')
);

