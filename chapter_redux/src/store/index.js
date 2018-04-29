import {createStore,combineReducers,applyMiddleware} from 'redux';
import {colors,sort} from '../reducers';
import {colorsList as StateData} from '../colorsList';

const logger = store => next => action => {
   let result;
    console.groupCollapsed('dispatching', action.type);
    console.log('prev state', store.getState());
    console.log('action',action);
    result = next(action);
};

const saver = store => next => action => {
   let result = next(action);
    localStorage['redux-store'] = JSON.stringify(store.getState());
    return result;
};

const storeFactory = (initialStatte = StateData) => 
applyMiddleware(logger,saver)(createStore)(combineReducers({colors,sort}),(localStorage['redux-store']) ? JSON.parse(localStorage['redux-store']) : StateData); 

export default storeFactory;