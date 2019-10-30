import axios from "axios";

export default {
    apiBasePath: '/api',
    callApi: async function(requestType='GET', url='', params={}, headers={}, showLoader=false) {
        url = this.apiBasePath+url;
        const methodName = requestType.toUpperCase();
        if(methodName === 'GET' ) {
            return await  axios.get(url, params, headers)
                .then(response => {return response;})
                .catch(error => { return error;})

        } else if(methodName === 'POST' ) {
            return await  axios.post(url, params, headers)
                .then(response => {return response;})


        } else{
            console.log('Invalid request method');
            return false;
        }
    }
}
