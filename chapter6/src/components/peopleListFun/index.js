import React from 'react';

const PeopleListFun = ({data})=> {
    <ol className="people-list">
        {
            data.result.map((person,i)=>{
                const {first,last} = person.name;
                return <li key={i}>{first} {last}</li>
            })
        }
    </ol>
};

export default PeopleListFun;