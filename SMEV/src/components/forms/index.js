import React, { Component } from 'react';

import Form from 'react-jsonschema-form';

class MainForm extends Component {

    constructor(props){
        super(props);
    }

    render() {

        const {dataForm} = this.props;
        console.log(dataForm.definitions.form);
 
        return (
            <div>
                <Form schema={dataForm}>

                </Form>
            </div>
        );
    }
}

export default MainForm;
