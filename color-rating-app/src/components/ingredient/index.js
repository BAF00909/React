import React from 'react';
import PropTypes from 'prop-types';

const  Ingredient = ({amount = 0, measurement = '', name = ''}) => (
    <li>
        <span className="ingredient-name">{name}</span>
        <span className="ingredient-amount">{amount}</span>
        <span className="ingredient-measurement">{measurement}</span>
    </li>
);

Ingredient.propTypes = {
    amount: PropTypes.number.isRequired,
    measurement: PropTypes.string,
    name: PropTypes.string
};

export default Ingredient;