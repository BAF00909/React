import React from 'react';
import Color from '../color';
import PropTypes from 'prop-types';
import './style.css';

const  ColorList = ({colors = [],onRemove = f => f, onRate =f => f})=> (
    <div className="list-color">
        {
            (colors.length === 0) ? <p>No colors (add color)</p> : colors.map((color)=>(
                <Color key={color.id} {...color} onRemove={() => onRemove(color.id)} onRate={(rating) => onRate(color.id,rating)}/>
            ))
        }
    </div>
);

ColorList.propTypes = {

};

export default ColorList;