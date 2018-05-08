import React, { Component } from 'react';
import PropTypes from 'prop-types';
import StarRating from '../starRating';
import '../../stylesheets/Color.scss';


const propTypes = {
    title: PropTypes.string,
    color: PropTypes.string,
    rating: PropTypes.number,
    onRate: PropTypes.func,
    onRemove: PropTypes.func
};

const defaultProps = {
    title: undefined,
    rating: 0,
    color: "#000",
    onRate: f => f,
    onRemove: f => f
};


class Color extends Component {

    componentWillMount(){
        this.style = {
            backgroundColor:"#ccc"
        }
    };

    componentWillUpdate(){
        this.style = null;
    };

    render() { 
        const {title,color,rating,onRemove,onRate} = this.props;
        return (
            <section className='color' style={this.style}>
                <h1>{title}</h1>
                <button onClick={onRemove}>X</button>
                <div className='color' style={{'backgroundColor':color}}></div>
                <div>
                    <StarRating starSelected={rating} onRate={onRate}/>
                </div>
            </section>
        );
    }
}


Color.propTypes = propTypes;
Color.defaultProps = defaultProps;
export default Color;


/*const Color = ({title,color,rating=0,onRemove=f=>f,onRate=f=>f}) => {
    
    
    return (
        <section className='color'>
            <h1>{title}</h1>
            <button onClick={onRemove}>X</button>
            <div className='color' style={{'backgroundColor':color}}></div>
            <div>
                <StarRating totalStars={5}  starSelected={rating} onRate={onRate}/>
            </div>
        </section>
    );
};

export default Color;*/