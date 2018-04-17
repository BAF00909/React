import { ADD_COLOR, RATE_COLOR, REMOVE_COLOR, SORT_COLORS } from "./constants";

export const actionAdd = {
    payload: {
        type: ADD_COLOR,
        id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
        color: "#0000FF",
        title: "Big Blue",
        timestamp: "Thu Mar 10 2016 01:11:12 GMT-0800 (PST)"
    }
};

export const actionRate = {
    payload: {
        type: RATE_COLOR,
        id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
        rating: 4
    }
};

export const actionRemove = {
    payload: {
        type: REMOVE_COLOR,
        id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    }
};

export const actionSort = {
    payload: {
        type: SORT_COLORS,
        sortBy: 'SORTED BY TITLE'
    }
};