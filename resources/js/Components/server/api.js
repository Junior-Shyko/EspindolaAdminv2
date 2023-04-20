import axios from "axios"


const baseUrlApi = "http://localhost:8000/api"

const api = axios.create({
    baseURL : "http://localhost:8000/"
});

export default api 