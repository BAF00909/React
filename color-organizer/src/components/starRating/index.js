import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Star from '../star';

const StarRating = ({totalStars=5, starSelected=0, onRate=f=>f}) => 
<div className='star-rating'>
    {
        [...Array(totalStars)].map((n,i)=>
                <Star key={i}
                selected={i<starSelected}
                onRate={()=>onRate(i+1)}
        />
        )
    }
    <p>{starSelected} of {totalStars} stars</p>
 </div>
/*class StarRating extends Component {

    constructor(props){
        super(props);
        this.state = {
            starSelected: props.starSelected || 0
        }
        this.change = this.change.bind(this);
    }

    change(starSelected){
        this.setState({starSelected});
    }

    render() {
        const {totalStars} = this.props;
        const {starSelected} = this.state;
        return (
            <div className='star-rating'>
                {
                    [...Array(totalStars)].map((n,i)=>
                    <Star key={i}
                        selected={i<starSelected}
                        onClick={()=>this.change(i+1)}
                    />
                    )
                }
                <p>{starSelected} of {totalStars} stars</p>
            </div>
        );
    }
};

StarRating.propTypes = {
    totalStar: PropTypes.number
};
*/

export default StarRating;