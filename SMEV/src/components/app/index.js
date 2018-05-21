import React, {Component} from 'react';
import PropTypes from 'prop-types';
import MainForm from '../forms';


class App extends Component {

     static PropTypes = {

    };

    constructor(props){
        super(props);
        this.state = {
            dataForm : {"":""},
            uiSchema: {"":""}
        };
        this.getJsonSchema = this.getJsonSchema.bind(this);
        this.getUiSchema = this.getUiSchema.bind(this);
    };

    getJsonSchema(){
        fetch('/src/jsons/Schema4.json')
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            console.log(res);
            this.setState({dataForm:res});
        })
        .catch( alert ); 
    };

    getUiSchema(){
        fetch('/src/jsons/uiSchema.json')
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            console.log(res);
            this.setState({uiSchema:res});
        })
        .catch( alert );   
    }

    componentDidMount(){
        this.getJsonSchema();
        this.getUiSchema(); 
    };

    render() {
        return(
            <div className="app">
               <MainForm dataForm = {this.state.dataForm} uiSchema={this.setState.uiSchema} />
            </div>
        )
    };
}

export default App;