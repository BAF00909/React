import React, { Component } from 'react';
import './style.scss';

import Form from 'react-jsonschema-form';

class MainForm extends Component {

    constructor(props){
        super(props);
    }

    onSubmit = (formData) => {
        console.log(formData.formData.form);
    };

    render() {

        const {dataForm} = this.props;
        console.log(dataForm.definitions.form);
 
        return (
            <div>
                <Form 
                schema={dataForm}
                onSubmit={this.onSubmit}
                >
                   
                </Form>
            </div>
        );
    }
}

export default MainForm;
