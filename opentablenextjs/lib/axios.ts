import axios from "axios";


const Axios = axios.create({
    baseURL: 'http://localhost:8000/',
    timeout: 50000,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
        'Accept' : 'application/json',
        // referer: 'http://localhost:3000/',
    },
    withCredentials:true
});

export default Axios