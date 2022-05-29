import axios from 'axios';
import {ref} from 'vue';

export default function useCategories(){
    const categories = ref([]);

    const getCategories = async()=>{
        let response = await axios.get('/api/categories'); 
        categories.value = response.data.data;
    }

    const destroyCategory = async (id)=>{
        await axios.delete('/api/categories/'+id); 
    }

    return {
        categories,
        getCategories,
        destroyCategory
    }
}