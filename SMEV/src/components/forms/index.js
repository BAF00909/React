import React, { Component } from 'react';
import './style.scss';

import Form from 'react-jsonschema-form';

class MainForm extends Component {

    constructor(props){
        super(props);
        this.state = {
            requestId : null,
            responseText: null
        }
        this.onSubmit = this.onSubmit.bind(this);
        this.handelRequestResponse = this.handelRequestResponse.bind(this)
    }

    onSubmit(formData){
        let data = {method:'POST',mode: 'no-cors', headers:{'Content-type': 'application/json','Content-Encoding': 'deflate, gzip',}, body: JSON.stringify(formData.formData)}
        console.log(data.body);
        
        fetch('http://gate.nvx.test/SmevGateway/api/tests/request', data)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({requestId:res});
            console.log(res); //4d346137-2262-474d-9700-0a3b6e81fa18
        })
        .catch( alert );
    };

    handelRequestResponse(){
        const {requestId} = this.state;   
        fetch('http://10.10.0.65/api/smev/getresponse/'+requestId)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            console.log(res);
            this.setState({responseText:res.data.RejectionReasonDescription});
        })
        .catch( alert );
    }

    render() {
        const {dataForm} =  this.props;
        const {requestId,responseText} = this.state;
        console.log(this.props);
        
 
        return (
            <div>
                <Form 
                schema={dataForm}
                onSubmit={this.onSubmit}
                >
                   
                </Form>
                <p>{requestId}</p>
                <p style={responseText != null ? {display:'block'} : {display: 'none'}}>{responseText}</p>
                <button style={requestId != null ? {display:'block'} : {display: 'none'}} onClick={this.handelRequestResponse}>Запросить статус дела</button>
            </div>
        );
    }
}

export default MainForm;
