import axios from "axios";

export default {
    apiBasePath: '/api',
    get: async function(url='', params={}, headers={}) {
        return await  axios.get( this.apiBasePath+url, headers)
            .then(response => {return response;})
            .catch(error => { return error;});
    },
    post: async function(url='', params={}, headers={}) {
        return await  axios.post(this.apiBasePath+url, params, headers)
            .then(response => {return response;})
    },
    put: async function(url='', params={}, headers={}) {
        return await  axios.put(this.apiBasePath+url, params, headers)
            .then(response => {return response;})
    },
    delete: async function(url='') {
        return await  axios.delete(this.apiBasePath+url)
            .then(response => {return response;})
            .catch(error => { return error;});
    },



}
