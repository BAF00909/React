import React from 'react';
import PropTypes from 'prop-types';
import  './style.css';

const  Star = ({selected = false, onRate = f => f}) =>(
    <div className={(selected) ? "star selected" : "star"} onClick={onRate}>
    </div>
);

Star.propTypes = {
    selected: PropTypes.bool,
    onClickHandler: PropTypes.func
};

export default Star;