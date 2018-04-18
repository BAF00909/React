import storeFactory from './store/index';
import {actionAdd,actionSort} from './AC'

const store = storeFactory(true);

store.dispatch(actionAdd("#0000FF","Big Blue"));
store.dispatch(actionAdd("#0000FF","Big Blue"));
store.dispatch(actionSort('title'));

/*import {createStore, combineReducers} from 'redux';
import {colors,sort} from './reducers';
import {colorsList} from './colorsList';
import { actionAdd, actionRate, actionSort } from './AC';

const initialState = {...colorsList, sortBy: "SORT_BY_TITLE"};
const store = createStore(combineReducers({
       colors,sort
}),initialState);

store.dispatch(actionAdd("#0000FF","Big Blue"));
store.dispatch(actionAdd("#0000FF","Big Blue"));
store.dispatch(actionSort('title'));


window.store = store;
console.log(store.getState());
*/