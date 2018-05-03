import React from 'react';
import PropTypes from 'prop-types';
import '../../stylesheets/Star.scss';

const star = ({selected=false,onClick = f => f}) => 
<div className={selected? 'star selected' : 'star'} onClick={onClick}></div>

star.propTypes = {
    selected: PropTypes.bool,
    onClick: PropTypes.func
}

export default star;