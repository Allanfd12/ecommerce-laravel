<template>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 ">
                                <h2 style="font-size:12pt; margin-top:10px">Todas as Categorias</h2>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-success pull-right">Adicionar Nova Categoria</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="category in categories" :key="category.id">
                                    <tr>

                                        <td>{{ category.id }}</td>
                                        <td>{{ category.name }}</td>
                                        <td>{{ category.slug }}</td>
                                        <td>
                                            <a href="#" ><i class="fa fa-edit fa-2x"></i></a>
                                            
                                            <a href="#" ><i class="fa fa-trash fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import useCategories from '../../../composable/category'
import { onMounted } from 'vue'

    export default {
        setup(){
            const {categories,getCategories} = useCategories()

            onMounted(getCategories) 

            return{
                categories
            }
        }
    }
</script>

<style>
    nav svg {
        height: 20px;
    }

    nav .hidden {
        display: block !important;
    }

</style>