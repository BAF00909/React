import React from 'react';
import Color from '../color';
import PropTypes from 'prop-types';
import './style.css';
import { actionRate, actionRemove } from '../../AC';


const  ColorList = ({store})=> {
    console.log(store.getState());
    const {colors,sort} = store.getState();
    
    return(<div className="list-color">
        {
            (colors.length === 0) ? <p>No colors (add color)</p> : colors.map((color)=>(
                <Color key={color.id} {...color} onRemove={() => store.dispatch(actionRemove(color.id))} onRate={(rating) => store.dispatch( actionRate(color.id,rating))}/>
            ))
        }
    </div>)
};

ColorList.propTypes = {

};

export default ColorList;