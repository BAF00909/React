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
            uiSchema: {"":""},
            dataForms: [],
            loading: true
        };
        this.getJsonSchema = this.getJsonSchema.bind(this);
        this.getJsonSchemases = this.getJsonSchemases.bind(this);
        this.getUiSchema = this.getUiSchema.bind(this);
    };

    getJsonSchema(id){
        fetch('http://gate.nvx.test/SmevGateway/api/settings/requests/' + id)
        .then(function(response) {
            return response.json();
        })
        .then((res) => { 
            console.log(res.templateSchema.replace(/[\t]+/g, ''));
            this.setState({dataForm:JSON.stringify(res.templateSchema.replace(/[\t,\n]+/g, ''))});
        })
        .catch( alert ); 
    };

    getJsonSchemases(){
        fetch('http://gate.nvx.test/SmevGateway/api/settings/requests')
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({dataForms:res, loading:false});
        })
        .catch( alert ); 
    };

    getUiSchema(){
        fetch('/src/jsons/uiSchema.json')
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({uiSchema:res});
        })
        .catch( alert );   
    }

    componentDidMount(){
        this.getJsonSchemases();
        this.getUiSchema(); 
    };

    render() {
        return(
            <div className="app">
            { this.state.loading ? <p>Loading...</p> :
                <ul>
                    {
                        this.state.dataForms.map((item,i) => <li key={i} onClick={()=>this.getJsonSchema(item.recId) }>{item.recName}</li>)
                    }
                </ul>
            }  
               <MainForm dataForm = {this.state.dataForm} uiSchema={this.setState.uiSchema} />
            </div>
        )
    };
}

export default App;