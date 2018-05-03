import React from 'react';
import Color from '../color';
import '../../stylesheets/ColorList.scss';

const ColorList = ({colors=[],onRate=f=>f},onRemove=f=>f) => {
    return (
        <div className='color-list'>
            {
                colors.length === 0 ? 
                <p>No colors list. (Add a color)</p> : 
                colors.map(color => 
                    <Color key={color.id} {...color}
                    onRate={(rating)=>onRate(color.id,rating)}
                    onRemove={()=>onRemove(color.id)}
                    />
                )
            }
        </div>
    );
};

export default ColorList;