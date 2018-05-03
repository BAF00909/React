import React from 'react';
import PropTypes from 'prop-types';
import '../../stylesheets/Star.scss';

const star = ({selected=false,onRate = f => f}) => 
<div className={selected? 'star selected' : 'star'} onClick={onRate}></div>

star.propTypes = {
    selected: PropTypes.bool,
    onClick: PropTypes.func
}

export default star;