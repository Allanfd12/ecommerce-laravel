import axios from 'axios';
import {ref} from 'vue';
import { useRouter } from 'vue-router';

export default function useCategories(){
    const categories = ref([]);
    const route = useRouter();
    const erros = ref('');

    const getCategories = async()=>{
        let response = await axios.get('/api/categories'); 
        categories.value = response.data.data;
    }
    const storeCategory = async (data)=>{
        await axios.post('/api/categories/',data); 
        await route.push({name:'category.index'});
    }
    const destroyCategory = async (id)=>{
        await axios.delete('/api/categories/'+id); 
    }

    return {
        categories,
        erros,
        getCategories,
        storeCategory,
        destroyCategory
    }
}