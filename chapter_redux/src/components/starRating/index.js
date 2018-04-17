import React, {Component} from 'react';
import PropTypes from 'prop-types';
import Star from '../star';

const StarRating = ({starSelected = 0,totalStars = 5, onRate = f => f}) => (
    <div className="star-rating">
        {
            [...Array(totalStars)].map((n,i) =>
                <Star key={i}
                      selected={i<starSelected}
                      onRate={ () => onRate(i+1)}
                />
            )
        }
        <br/>
        <p>{`${starSelected} of ${totalStars}`}</p>
    </div>
);

StarRating.propTypes = {
    totalStars: PropTypes.number,
    starSelected: PropTypes.number,
    onRate: PropTypes.func
};



export default StarRating;