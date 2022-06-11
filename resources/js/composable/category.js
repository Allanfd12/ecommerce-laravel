import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default function useCategories() {
    const categories = ref([]);
    const category = ref([]);
    const route = useRouter();
    const erros = ref('');

    const getCategory = async (id) => {
        let response = await axios.get('/api/categories/'+id);
        category.value = response.data.data;
    }
    const getCategories = async () => {
        let response = await axios.get('/api/categories');
        categories.value = response.data.data;
    }
    const storeCategory = async (data) => {
        erros.value = '';
        try {
            await axios.post('/api/categories/', data);
            await route.push({ name: 'category.index' });
        } catch (e) {
            if(e.response.status === 422) {
                for(let key in e.response.data.errors) {
                    erros.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }
    const updateCategory = async (id) => {
        erros.value = '';
        try {
            await axios.put('/api/categories/'+id, category.value);
            await route.push({ name: 'category.index' });
        } catch (e) {
            if(e.response.status === 422) {
                for(let key in e.response.data.errors) {
                    erros.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }
    const destroyCategory = async (id) => {
        await axios.delete('/api/categories/' + id);
    }

    return {
        categories,
        category,
        erros,
        getCategories,
        getCategory,
        storeCategory,
        updateCategory,
        destroyCategory
    }
}