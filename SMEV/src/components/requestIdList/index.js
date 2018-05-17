import React from 'react';
import './style.scss';

const RequestIdList = ({listId = [],onClickHandler}) => (
    
  <ul>
        {
            listId.map((item,i) => 
            <li key={i}>
                <button onClick={() => onClickHandler(item)}>{item}</button>
            </li>)
        }
    </ul>
);

export default RequestIdList;
 