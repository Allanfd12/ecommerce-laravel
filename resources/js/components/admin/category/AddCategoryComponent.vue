<template>
<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <h2 style="font-size:12pt; margin-top:10px">Adicionar nova Categoria</h2>
                            </div>
                            <div class="col-md-6">
                                 <router-link :to="{ name: 'category.index' }" class="btn btn-primary pull-right">
                                   Todas as categorias
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" >
                        <div class="mt-2 mb-6 text-sm" v-if="erros!==''">
                            {{erros}}
                        </div>
                        <form class="form-horizontal" @submit.prevent="saveCategory" >
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nome da Categoria</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nome da Categoria" class="form-control input-md"
                                         required autofocus v-model="form.name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-md-4 control-label">Slug da Categoria</label>
                                <div class="col-md-4">
                                    <input id="slug" type="text" placeholder="Slug da Categoria"
                                        class="form-control input-md" required autofocus v-model="form.slug">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import {reactive} from 'vue';
import useCategories from '../../../composable/category';

export default {
    
    setup() {
       const form = reactive({
            'name' :'',
            'slug' :'',
        })

        const {erros, storeCategory} = useCategories();
        
        const saveCategory = async() =>{
            await storeCategory({...form});
        }
        return{
            form,
            erros,
            saveCategory
        }
    },
}
</script>
