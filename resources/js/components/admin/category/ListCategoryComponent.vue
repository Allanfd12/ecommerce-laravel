<template>
  <div class="mx-3 p-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  <h2 style="font-size: 12pt; margin-top: 10px">
                    Todas as Categorias
                  </h2>
                </div>
                <div class="col-md-6">
                  <router-link
                    :to="{ name: 'category.create' }"
                    class="btn btn-primary pull-right"
                  >
                    <i class="fa fa-plus"></i>
                    Adicionar Nova Categoria
                  </router-link>
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
                        <router-link
                          :to="{
                            name: 'category.edit',
                            params: { id: category.id },
                          }"
                        >
                          <i class="fa fa-edit fa-2x"></i>
                        </router-link>

                        <a href="#" @click="deleteCategory(category.id)"
                          ><i class="fa fa-trash fa-2x text-danger"></i
                        ></a>
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
  </div>
</template>

<script>
import useCategories from "../../../composable/category";
import { onMounted } from "vue";

export default {
  setup() {
    const { categories, getCategories, destroyCategory } = useCategories();

    onMounted(getCategories);

    const deleteCategory = async (id) => {
      if (!confirm("Deseja realmente excluir esta categoria?")) {
        return;
      }

      await destroyCategory(id);
      await getCategories();
    };

    return {
      categories,
      deleteCategory,
    };
  },
};
</script>

<style scoped>
nav svg {
  height: 20px;
}

nav .hidden {
  display: block !important;
}
</style>