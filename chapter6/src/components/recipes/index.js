import React from 'react';
import Instructions from '../inctructions';
import IngredientList from '../ingredientList';
import PropTypes from 'prop-types';

const Recipes = ({name = 'no name', ingredients = [], steps = []}) => (
    <section id={name.toLowerCase().replace(/ /g,'-')}>

        <h1>{name}</h1>
        <IngredientList list={ingredients} />
        <Instructions title="Cooking Instructions" steps={steps}/>

    </section>
);

Recipes.propTypes = {
  name: PropTypes.string,
  ingredients: PropTypes.array.isRequired,
  steps: PropTypes.array.isRequired
};



export default Recipes;