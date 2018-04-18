import { ADD_COLOR, RATE_COLOR, REMOVE_COLOR, SORT_COLORS } from "../AC/constants";
import {actionAdd, actionRate, actionRemove, actionSort} from '../AC';

export const color = (state={},action) => {
    const {type,payload} = action;
    switch(type){
        case ADD_COLOR: return{
            id: payload.id,
            title: payload.title,
            color: payload.color,
            timestamp: payload.timestamp,
            rating: 0
        };
        case RATE_COLOR : return (state.id !== payload.id) ? state : {...state, rating: payload.rating};
        default:  return state;
    }
};

export const colors = (state=[],action) => {
    const {type,payload} = action;
    switch(type){
        case ADD_COLOR: return [...state, color({},action)];
        case RATE_COLOR: return state.map(c=>color(c,action));
        case REMOVE_COLOR: return state.filter(c=>c.id !== payload.id);
        default: return state; 
    }
};

export const sort = (state = "SORTED_BY_DATE", action) => {
    const {type,payload} = action;
    switch(type){
        case SORT_COLORS: return payload.sortBy;
        default: return state;
    }
};
