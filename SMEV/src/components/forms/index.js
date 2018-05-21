import React, { Component } from 'react';
import './style.scss';
import RequestIdList from '../requestIdList';

import Form from 'react-jsonschema-form';

class MainForm extends Component {

    constructor(props){
        super(props);
        this.state = {
            requestId : null,
            responseText: null,
            localStor: [],
            reRender: false
        }
        this.onSubmit = this.onSubmit.bind(this);
        this.handelRequestResponse = this.handelRequestResponse.bind(this)
        this.handelRequestResponseEl = this.handelRequestResponseEl.bind(this);
        this.onSaveLocalStorage = this.onSaveLocalStorage.bind(this);
        this.handlerChange = this.handlerChange.bind(this);
    }

    onSaveLocalStorage(value){
        let valueArr = window.localStorage.SMEV ? JSON.parse(window.localStorage.SMEV) : [];
        valueArr.push(value);
        window.localStorage.SMEV = JSON.stringify(valueArr);
    };

    onSubmit(formData){
        let data = {
            method:'POST', 
            mode:'cors', 
            headers:{
                'Content-Type':'application/json; charset=utf-8',
                'Content-Encoding':'gzip, deflate'
            }, 
            body: JSON.stringify(formData.formData)
        };

       fetch('http://gate.nvx.test/SmevGateway/api/tests/request', data)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({requestId:res});
            this.onSaveLocalStorage(res)
            this.setState({
                localStor: window.localStorage.SMEV ? JSON.parse(window.localStorage.SMEV) : []
            })
        })
        .catch( alert );
    };

    handelRequestResponse(){
        const {requestId} = this.state; 
        //http://gate.nvx.test/SmevGateway/api/tests/askresponse/true/
        //http://10.10.0.65/api/smev/getresponse/
        fetch('http://gate.nvx.test/SmevGateway/api/viewlog/requests/' + requestId)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({responseText:res.response});
        })
        .catch( alert );
    };

    handelRequestResponseEl(id){
        console.log(id);
        fetch('http://gate.nvx.test/SmevGateway/api/viewlog/requests/' + id)
        .then(function(response) {
            return response.json();
        })
        .then((res) => {
            this.setState({responseText:res.response});
        })
        .catch( alert );
    };

    handlerChange(changed){
        //console.log(changed);
    };

    componentWillMount(){
        this.setState({
            localStor: window.localStorage.SMEV ? JSON.parse(window.localStorage.SMEV) : []
        })
    };


    render() {
        const {dataForm,uiSchema} =  this.props;
        const {requestId, responseText, localStor} = this.state;
        
        return (
            <div>

                <div className="request-block">
                    <div className="request-block__left">
                        <p>Созданные запросы</p>
                        <RequestIdList listId={this.state.localStor} onClickHandler = {this.handelRequestResponseEl}/>
                    </div>
                    <div className="request-block__right">
                        <p style={responseText != null ? {display:'block'} : {display: 'none'}}>ответ:<br/>
                            {responseText ? JSON.parse(responseText).RejectionReasonDescription : null}
                         </p>
                    </div>   
                </div>

                <Form 
                    schema={dataForm}
                    uiSchema={uiSchema}
                    onSubmit={this.onSubmit}
                    onChange={this.handlerChange}
                />  

                <p>{requestId}</p>
                <button style={requestId != null ? {display:'block'} : {display: 'none'}} onClick={this.handelRequestResponse}>Запросить статус дела</button>

            </div>
        );
    }
}

export default MainForm;
