import React from 'react';
import PropTypes from 'prop-types';

const  Summary = ({ingredients = 0, steps = 0, title='[recipe]'}) => (
    <div>
        <h1>{title}</h1>
        <p>{ingredients} ingredients / {steps} steps</p>
    </div>
);

Summary.propTypes = {
    ingredients : PropTypes.array.isRequired,
    steps : PropTypes.array.isRequired,
    title : PropTypes.string
};

export default Summary;