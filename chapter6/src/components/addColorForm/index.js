import React, {Component} from 'react';
import PropTypes from 'prop-types';
import './style.css';



class AddColorForm extends Component {

     static PropTypes = {
         onNewColor: PropTypes.func.isRequired
    };

    constructor(props){
        super(props);
    };


    submitHandler = (ev) => {
        const {_title,_color} = this.refs;
        const {onNewColor} = this.props;
        ev.preventDefault();
        console.log(_title.value,_color.value);
        onNewColor(_title.value,_color.value);
        _title.value = '';
        _color.value = '#000000';
        _title.focus();
    };

    render() {
        return(
            <form onSubmit={this.submitHandler} className="color-form">
            
                <input ref="_title" type="text" placeholder="color title..." required/>
                <input ref="_color" type="color" required/>
                <button className="submit-color-form" onClick={this.submitHandler}>Add</button>

            </form>
        )
    };
}

export default AddColorForm