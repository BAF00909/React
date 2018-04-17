import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {v4} from 'uuid';
import AddColorForm from '../addColorForm';
import ColorList from '../colorList';
//import MembersList from '../members';
//import HiddenMessages from '../hiddenMessages';
//import CountriesList from '../countryList';
//import PeopleList from '../peopleList';


const data = [
    {
        year: 1879,
        event: "Ski Manufacturing Begins"
    },
    {
        year: 1882,
        event: "US Ski Club Founded"
    },
    {
        year: 1924,
        event: "First Winter Olympics Held"
    },
    {
        year: 1926,
        event: "First US Ski Shop Opens"
    },
    {
        year: 1932,
        event: "North Americas First Rope Tow Spins"
    },
    {
        year: 1936,
        event: "First Chairlift Spins"
    },
    {
        year: 1949,
        event: "Squaw Valley, Mad River Glen Open"
    },
    {
        year: 1958,
        event: "First Gondola Spins"
    },
    {
        year: 1964,
        event: "Plastic Buckle Boots Available"
    }
];

class App extends Component {

     static PropTypes = {

    };

    constructor(props){
        super(props);

        this.state = {
            colors: [ {
                "id": "0175d1f0-a8c6-41bf-8d02-df5734d829a4",
                "title": "ocean at dusk",
                "color": "#00c4e2",
                "rating": 5
            },
                {
                    "id": "83c7ba2f-7392-4d7d-9e23-35adbe186046",
                    "title": "lawn",
                    "color": "#26ac56",
                    "rating": 3
                },
                {
                    "id": "a11e3995-b0bd-4d58-8c48-5e49ae7f7f23",
                    "title": "bright red",
                    "color": "#ff0000",
                    "rating": 0
                }]
        }
    };

    addColor = (title, color) => {
        const colors = [
            ...this.state.colors,
            {
                id: v4(),
                title,
                color,
                rating: 0
            }
        ];
        this.setState({colors});
    };

    onRemove = (id)=> {
        const colors = this.state.colors.filter(color => color.id !== id);
        this.setState({colors});
    };

    onRate = (id,rating) => {
        const colors = this.state.colors.map(color => (color.id !== id) ? color: {...color, rating});
        this.setState({colors});
    };

    render() {
        const {colors} = this.state;
        return(
            <div className="app">
                <AddColorForm onNewColor = {this.addColor}/>
                <div>
                    <ColorList colors = {colors} onRemove={this.onRemove} onRate={this.onRate}/>
                </div>
            </div>
        )
    };
}

export default App;