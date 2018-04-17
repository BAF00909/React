import React, {Component} from 'react';
import PropTypes from 'prop-types';

class HiddenMessage extends Component {

     static PropTypes = {

    };

    constructor(props){
        super(props);
        this.state = {
            hidden: props.hide ? props.hide : true
        }
    }

    componentWillReceiveProps(nextProps){
        this.setState({hidden:nextProps.hidden});
    };

    render() {
        const {children} = this.props;
        const {hidden} = this.state;
        return(
            <p>
                {
                    (hidden) ? children.replace(/[a-zA-Z0-9]/g,"x") : children
                }
            </p>
        )
    };
}

export default HiddenMessage;