import { ADD_COLOR, RATE_COLOR, REMOVE_COLOR, SORT_COLORS } from "../AC/constants";
import {actionAdd, actionRate, actionRemove, actionSort} from '../AC';

const existingColor =[ {
    id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    title: "Big Blue",
    color: "#0000FF",
    timestamp: "Thu Mar 10 2016 01:11:12 GMT-0800 (PST)",
    rating: 0
}
];

export const color = (state={},action) => {
    const {type,id,color,title,timestamp,rating} = action.payload;
    switch(type){
        case ADD_COLOR: return{
            id: id,
            title: title,
            color: color,
            timestamp: timestamp,
            rating: 0
        };
        case RATE_COLOR : return (state.id !== id) ? state : {...state, rating: rating};
        default:  return state;
    }
};

export const colors = (state=[],action) => {
    const {type, id} = action.payload;
    switch(type){
        case ADD_COLOR: return [...state, color({},action)];
        case RATE_COLOR: return state.map(c=>color(c,action));
        case REMOVE_COLOR: return state.filter(c=>c.id !== id);
        default: return state; 
    }
};
//console.log(colors(existingColor,actionAdd));
//console.log(colors(existingColor,actionRate));
//console.log(colors(existingColor,actionRemove));

export const sort = (state = "SORTED_BY_DATE", action) => {
    const {type, sortBy} = action.payload;
    switch(type){
        case SORT_COLORS: return sortBy;
        default: return state;
    }
};

console.log(sort(existingColor,actionSort));