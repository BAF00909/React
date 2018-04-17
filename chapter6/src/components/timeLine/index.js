import React, {Component} from 'react';
import PropTypes from 'prop-types';
import * as d3 from 'D3';

class TimeLine extends Component {

     static PropTypes = {

    };


    constructor({data=[]}){
        const times = d3.extent(data.map(d => d.year));
        const range = [50,450];
        super({data});
        this.state = {times,data,range}
        console.log(data);
    };

    componentDidMount(){
      let group;
      const {data,times,range} = this.state;
      const {target} = this.refs;
      const scale = d3.scaleTime().domain(times).range(range);

      d3.select(target)
          .append('svg')
          .append('height', 200)
          .append('width', 500);

      group = d3.select(target.children[0])
          .selectAll('g')
          .data(data)
          .enter()
          .append('g')
          .attr('transform', (d,i) => 'translate(' + scale(d.year) + ',0)');

      group.append('circle')
          .attr('cy', 160)
          .attr('r', 5)
          .style('fill','blue');

      group.append('text')
          .text(d => d.year + '-' + d.event)
          .style('font-size', 10)
          .attr('y', 115)
          .attr('x',-95)
          .attr('transform','rotate(45)');
    };

    render() {
        return(
            <div className="time-line">
                <h1>{this.props.name} Time line</h1>
                <div ref="target">

                </div>
            </div>
        )
    };
}

export default TimeLine;