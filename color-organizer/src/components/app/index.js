import React, { Component } from 'react';
import AddColorForm from '../addColorForm';
import StarRating from '../starRating';

class App extends Component {

    constructor(props){
        super(props)

        this.onRate = this.onRate.bind(this);
    };

    onRate(){
        return null;
    };

    render() {
        return (
            <div>
                <AddColorForm onNewColor = {(title,color) => {
                    console.log(`TODO: add new ${title} and ${color} to the list`);
                    console.log(`TODO: render UI with new color`);
                    }}
                 />
                 <StarRating totalStars={5}  starSelected={0} onRate={this.onRate}/>
            </div>
        );
    }
}

export default App;