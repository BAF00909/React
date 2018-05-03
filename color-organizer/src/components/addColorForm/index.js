import React, { Component } from 'react';
import PropTypes from 'prop-types';
import '../../stylesheets/AddColorForm.scss';

class AddColorForm extends Component {

    static defaultProps = {
        onNewColor: f => f
    }

    constructor(props){
        super(props)
        this.submit = this.submit.bind(this);
    }

    submit(e){
        const {_title,_color} = this.refs;
        e.preventDefault();
        this.props.onNewColor(_title.value, _color.value);
        _title.value = '';
        _color.value = '#000000';
        _title.focus();
    }

    render() {
        return (
            <form onSubmit={this.submit} className='add-color'>
                <input ref='_title' type='text' placeholder='color title...' required />
                <input ref='_color' type='color' required />
                <button>add</button>
            </form>
        );
    }
}

AddColorForm.propTypes = {
    onNewColor: PropTypes.func
}

export default AddColorForm;