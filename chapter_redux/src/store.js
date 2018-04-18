import {createStore, combineReducers} from 'redux';
import {colors,sort} from './reducers';
import {colorsList} from './colorsList';
import { actionAdd, actionRate } from './AC';

const initialState = {...colorsList, sortBy: "SORT_BY_TITLE"};
const store = createStore(combineReducers({
       colors,sort
}),initialState);

store.dispatch(actionAdd("4243e1p0-9abl-4e90-95p4-8001l8yf3036","#0000FF","Big Blue","Thu Mar 10 2016 01:11:12 GMT-0800 (PST)"));
store.dispatch(actionAdd("4243e1p0-9abl-4e90-95p4-8001l8yf3067","#0000FF","Big Blue","Thu Mar 15 2016 01:11:12 GMT-0800 (PST)"));

store.dispatch(actionRate("4243e1p0-9abl-4e90-95p4-8001l8yf3036", 3));

window.store = store;
console.log(store.getState());
