import React, {Component} from 'react';
import PropTypes from 'prop-types';
import MainForm from '../forms';
import * as dataForm from '../../EX1.json';


class App extends Component {

     static PropTypes = {

    };

    constructor(props){
        super(props);
    };


    render() {
        return(
            <div className="app">
               <MainForm dataForm = {dataForm}/>
            </div>
        )
    };
}

export default App;