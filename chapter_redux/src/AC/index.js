import { ADD_COLOR, RATE_COLOR, REMOVE_COLOR, SORT_COLORS } from "./constants";
import {v4} from 'uuid';

export const actionAdd = (color,title) =>({
    type: ADD_COLOR,
    payload: {
        id: v4(),
        color: color,
        title: title,
        timestamp: new Date().toString()
    }
});

export const actionRate = (id, rating) => ({
    type: RATE_COLOR,
    payload: {
        id: id,
        rating: rating
    }
});

export const actionRemove = (id) => ({
    type: REMOVE_COLOR,
    payload: {
        id: id
    }
});

export const actionSort = (sortBy) =>  (sortBy === 'ratng') ? 
({
    type: SORT_COLORS,
    payload: {
        sortBy: 'SORT_BY_RATING'
    }
}): 
(sortBy === 'title') ?
({
    type: SORT_COLORS,
    payload: {
        sortBy: 'SORT_BY_TITLE'
    }
}) :
({
    type: SORT_COLORS,
    payload: {
        sortBy: 'SORT_BY_DATE'
    }
}) 
;