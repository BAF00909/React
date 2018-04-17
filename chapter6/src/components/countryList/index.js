import React, {Component} from 'react';
import PropTypes from 'prop-types';
import fetch from 'isomorphic-fetch';

class countryList extends Component {

     static PropTypes = {

    };

    constructor(props){
        super(props);
        this.state = {
            countryName: [],
            loading: false
        }
    };

    componentDidMount(){
        this.setState({loading: true});
        fetch('https://restcountries.eu/rest/v1/all')
            .then(response => response.json())
            .then(json => json.map(country => country.name))
            .then(countryName => this.setState({countryName,loading:false}))
    };

    render() {
        const {countryName, loading} = this.state;

        return(loading) ?
            <div>Country Name loading ...</div> :
            (!countryName.length) ?
                <div>No countries name</div> :
                <ul>
                    {countryName.map((country,i) => <li key={i}>{country}</li>)}
                </ul>
    };
}

export default countryList;