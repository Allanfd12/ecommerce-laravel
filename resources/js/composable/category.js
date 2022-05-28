import axios from 'axios';
import {ref} from 'vue';

export default function useCategories(){
    const categories = ref([]);

    const getCategories = async()=>{
        console.log('getCategories');
        let response = await axios.get('/api/categories'); 
        categories.value = response.data.data;
        console.log(response.data);
    }

    return {
        categories,
        getCategories
    }
}