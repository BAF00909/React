import React from 'react';
import Recipes from '../recipes';
import PropTypes from 'prop-types';
import AddColorForm from '../addColorForm';

const logColor = (title, color) => {
    console.log(`New color: ${title} ${color}`);
};

const Menu = ({recipes=[]}) => (
    <article>
        <header>
            <AddColorForm onNewColor = {logColor}/>
            <h1>Delicious Recipes</h1>
        </header>
        <div className="recipes">
            {recipes.map((recipe,i)=>
                <Recipes key={i} {...recipe} />
            )};
        </div>
    </article>
);

Menu.propTypes = {
    recipes : PropTypes.array.isRequired
};

export default Menu;