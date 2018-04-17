import {createStore, combineReducers} from 'redux';
import {colors,sort} from './reducers';
import {colorsList} from './colorsList';
import { ADD_COLOR, RATE_COLOR } from './AC/constants';

const initialState = {...colorsList, sortBy: "SORT_BY_TITLE"};
const store = createStore(combineReducers({
       colors,sort
}),initialState);

store.dispatch({
    type: ADD_COLOR,
    id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    color: "#0000FF",
    title: "Big Blue",
    timestamp: "Thu Mar 10 2016 01:11:12 GMT-0800 (PST)"
});

store.dispatch({
    type: RATE_COLOR,
    id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    rating: 3
});

window.store = store;
console.log(store.getState());
