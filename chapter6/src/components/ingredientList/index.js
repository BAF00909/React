import React from 'react';
import Ingredient from '../ingredient';
import PropTypes from 'prop-types';

const IngredientList = ({list = []})=> (
    <ul>
        {list.map((ingredient, i) => <Ingredient key={i} {...ingredient} />)}
    </ul>
);

IngredientList.propTypes = {
    list: PropTypes.array.isRequired
};

export default IngredientList;