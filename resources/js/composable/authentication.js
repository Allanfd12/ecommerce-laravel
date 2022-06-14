import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default function useAuthentication() {

    const route = useRouter();
    const erros = ref('');

    const login = async (data) => {
        erros.value = '';
        try {
            let a = await axios.post("/api/auth/login", data);
            if(a.data.user_type === 'admin') {
                await route.push({ name: "category.index" });
            }else{
                location.href = "/";
            }
        } catch (e) {
            if (e.response.status === 422) {
                for (let key in e.response.data.errors) {
                    erros.value += e.response.data.errors[key][0] + " ";
                }
            } else {
                erros.value = "Falha ao logar, verifique seu email ou senha";
            }
        }
    }
    const logout = async () => {
        await axios.post("/api/auth/logout");
        await route.push({ name: "login" });
    }

    const register = async (data) => {
        erros.value = '';
        try {
            await axios.post("/api/auth/register", data);
            await route.push({ name: "login" });
        } catch (e) {
            if (e.response.status === 422) {
                for (let key in e.response.data.errors) {
                    erros.value += e.response.data.errors[key][0] + " ";
                }
            } else {
                erros.value = "Falha ao registrar, verifique seus dados";
            }
        }
    }

        return {
            login,
            logout,
            register,
            erros
        }
    
}