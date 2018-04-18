import { ADD_COLOR, RATE_COLOR, REMOVE_COLOR, SORT_COLORS } from "./constants";

export const actionAdd = (id,color,title,timestamp) =>({
    type: ADD_COLOR,
    payload: {
        id: id,
        color: color,
        title: title,
        timestamp: timestamp
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

export const actionSort = (sortBy) =>  ({
    type: SORT_COLORS,
    payload: {
        sortBy: sortBy
    }
});