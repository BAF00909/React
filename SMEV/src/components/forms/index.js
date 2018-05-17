import React, { Component } from 'react';
import './style.scss';

import Form from 'react-jsonschema-form';

class MainForm extends Component {

    constructor(props){
        super(props);
        this.state = {
            requestId : null,
            responseText: null,
            localStor: []
        }
        this.onSubmit = this.onSubmit.bind(this);
        this.handelRequestResponse = this.handelRequestResponse.bind(this)
    }

    onSaveLocalStorage(value){
        let valueArr = window.localStorage.SMEV ? JSON.parse(window.localStorage.SMEV) : [];
        valueArr.push(value);
        window.localStorage.SMEV = JSON.stringify(valueArr);
    }

    onSubmit(formData){
        let data = {
            method:'POST', 
            mode:'cors', 
            headers:{
                'Content-Type':'application/json; charset=utf-8',
                'Content-Encoding':'gzip, deflate'
            }, 
            body: JSON.stringify(formData.formData)
        }
        console.log(data.body);
        
       fetch('http://gate.nvx.test/SmevGateway/api/tests/request', data)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({requestId:res});
            console.log(res); //4d346137-2262-474d-9700-0a3b6e81fa18
            this.onSaveLocalStorage(res)
        })
        .catch( alert );
    };

    handelRequestResponse(){
        const {requestId} = this.state; 
        //http://gate.nvx.test/SmevGateway/api/tests/askresponse/true/
        //http://10.10.0.65/api/smev/getresponse/
        fetch('http://gate.nvx.test/SmevGateway/api/viewlog/requests/'+requestId)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            console.log(res.RejectionReasonDescription);
            this.setState({responseText:res.response});
        })
        .catch( alert );
    };

    handelRequestResponseEl(id){
        event.preventDefault();
        fetch('http://gate.nvx.test/SmevGateway/api/viewlog/requests/'+id)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            console.log(res.RejectionReasonDescription);
            this.setState({responseText:res.response});
        })
        .catch( alert );
    }

    componentWillMount(){
        this.setState({
            localStor: JSON.parse(window.localStorage.SMEV)
        })
    };

    render() {
        const {dataForm} =  this.props;
        const {requestId,responseText,localStor} = this.state;
        console.log(this.props);
        console.log(this.state);
        
        return (
            <div>
                <p>Созданные запросы</p>
                <ul>
                    {
                        localStor.map((item,i) => <li key={i}><a href="#" onClick={() => {this.handelRequestResponseEl(item)}}>{item}</a></li>)
                    }
                </ul>
                <Form 
                schema={dataForm}
                onSubmit={this.onSubmit}
                >
                   
                </Form>
                <p>{requestId}</p>
                <p style={responseText != null ? {display:'block'} : {display: 'none'}}>ответ: {responseText}</p>
                <button style={requestId != null ? {display:'block'} : {display: 'none'}} onClick={this.handelRequestResponse}>Запросить статус дела</button>
            </div>
        );
    }
}

export default MainForm;
