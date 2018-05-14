import C from '../AC/constants';

export const color = (state={},action) => {
    switch(action.type) {
        case C.ADD_COLOR: 
        return {
            id: action.id,
            title: action.title,
            color: action.color,
            timestamp: action.timestamp,
            rating: 0
        }
        case C.RATE_COLOR: 
        return (state.id !== action.id)? state : {...state,rating:action.rating}
        default: return state
    }
    return {}
}
export const colors = (state=[],action) => {
    return []
}
export const sort = (state='SORTED_BY_DATE',action) => {
    return ""
}

const action = {
    type: "ADD_COLOR",
    id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    color: '#0000ff',
    title: 'Big Blue',
    timestamp: "Thu Mar 10 2018 10:11:12 GMT-0800 (PST)"
}

const existingColor = {
    type: "ADD_COLOR",
    id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    color: '#0000ff',
    title: 'Big Blue',
    timestamp: "Thu Mar 10 2018 10:11:12 GMT-0800 (PST)"
}

const actionRate = {
    type: "RATE_COLOR",
    id: "4243e1p0-9abl-4e90-95p4-8001l8yf3036",
    rating: 4
}

console.log(color({},action));
console.log(color(existingColor,actionRate));