import React, {Component} from 'react';
import PropTypes from 'prop-types';
import MainForm from '../forms';


class App extends Component {

     static PropTypes = {

    };

    constructor(props){
        super(props);
        this.state = {
            dataForm : {"":""}
        }
    };

    componentDidMount(){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/src/DataSend.json', true);
        xhr.send();
        xhr.onreadystatechange = ()=>{
          if (xhr.readyState != 4) return;
          if (xhr.status != 200) {
            alert(xhr.status + ': ' + xhr.statusText);
          } else {
            this.setState({dataForm: JSON.parse(xhr.responseText)});
          }
        
        }
    };

    render() {
        console.log(this.state.dataForm);
        return(
            <div className="app">
               <MainForm dataForm = {this.state.dataForm} />
            </div>
        )
    };
}

export default App;