import React from 'react';
import PropTypes from 'prop-types';

const  Instructions = ({title = 'no title', steps = []}) => (
    <section className="instructions">
        <h2>{title}</h2>
        {steps.map((step,i)=> <p key={i}>{step}</p>)}
    </section>
);

Instructions.propTypes = {
    title: PropTypes.string,
    steps: PropTypes.array.isRequired
};

export default Instructions;