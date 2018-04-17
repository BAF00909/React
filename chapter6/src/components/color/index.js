import React, {Component} from 'react';
import PropTypes from 'prop-types';
import StarRating from '../starRating';
import './style.css';

class Color extends Component {

     static PropTypes = {
         title: PropTypes.string,
         color: PropTypes.string,
         rating: PropTypes.number
    };

    static defaultProps = {
        title: 'No name',
        color: '#000000',
        rating: 0,
        onRemove: f => f,
        onRate: f => f
    };

    constructor(props){
        super(props);
    };

    componentWillMount(){
        this.style = {backgroundColor: '#ccc'}
    };

    shouldComponentUpdate(nextProps){
        const {rating} = this.props;
        return rating !== nextProps.rating;
    };

    componentWillUpdate(nextProps){
        const {title, rating} = this.props;
        this.style = null;
        this.refs.title.style.backgroundColor = 'red';
        this.refs.title.style.color = 'white';
        alert(`${title} : ${rating} -> ${nextProps.rating}`);
    };

    componentDidUpdate(prevProps){
        const {title, rating} = this.props;
        const status = (rating > prevProps.rating) ? 'better' : 'worse';
        this.refs.title.style.backgroundColor = '';
        this.refs.title.style.color = 'black';
    };


    render() {
        const {title, color, rating, onRemove, onRate}  =this.props;
        return(
            <section className="color" style={this.style}>
                <h1 ref="title">{title}</h1>
                <button onClick={onRemove}>X</button>
                <div className="color-view" style={{backgroundColor : color}}>
                </div>
                <div>
                    <StarRating starSelected={rating} onRate={onRate}/>
                </div>
            </section>
        )
    };
}

export default Color;