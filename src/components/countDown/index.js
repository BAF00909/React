import React from 'react';

const countdownAction = dispatcher => 
({
    tick(currentCount){
        dispatcher.handleAction({type: 'TICK'})
    },
    reset(count){
        dispatcher.handleAction({type: 'RESET',count})
    }
});

const CountDown = ({count = 0, tick = f => f, reset = f => f}) => {

    if(count){
        setTimeout(()=>tick(),1000);
    }

    return (count) ? 
    <h1>{count}</h1> : 
    <div onClick={()=>reset(10)}>
        <span>SELEBRATE!!!</span>
        <span>(click to start over)</span>
    </div>
};

export default CountDown;
