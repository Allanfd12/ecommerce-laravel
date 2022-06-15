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
                    Editar Categoria
                  </h2>
                </div>
                <div class="col-md-6">
                  <router-link
                    :to="{ name: 'category.index' }"
                    class="btn btn-primary pull-right"
                  >
                    Todas as categorias
                  </router-link>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="mt-2 mb-6 text-sm" v-if="erros !== ''">
                <strong>{{ erros }}</strong>
              </div>
              <form class="form-horizontal mt-2" @submit.prevent="saveCategory">
                <div class="form-group p-2">
                  <label for="name" class="col-md-4 mb-1 control-label"
                    >Nome da Categoria</label
                  >
                  <div class="col-md-4">
                    <input
                      type="text"
                      placeholder="Nome da Categoria"
                      class="form-control input-md"
                      autofocus
                      required
                      v-model="category.name"
                      v-on:keyup="getSlug"
                    />
                  </div>
                </div>
                <div class="form-group p-2">
                  <label for="slug" class="col-md-4 mb-1 control-label"
                    >Slug da Categoria</label
                  >
                  <div class="col-md-4">
                    <input
                      id="slug"
                      type="text"
                      placeholder="Slug da Categoria"
                      class="form-control input-md"
                      required
                      autofocus
                      v-model="category.slug"
                    />
                  </div>
                </div>
                <div class="form-group p-2">
                  <div class="col-md-4">
                    <button id="submit" type="submit" class="btn btn-primary">
                      Salvar
                    </button>
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
import { onMounted, reactive } from "vue";
import useCategories from "../../../composable/category";
import useFormater from "../../../composable/formater";

export default {
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  setup(props) {
    const { generateSlug } = useFormater();
    const { category, getCategory, erros, updateCategory } = useCategories();

    onMounted(getCategory(props.id));

    const saveCategory = async () => {
      await updateCategory(props.id);
    };
    const getSlug = () => {
      category.value.slug = generateSlug(category.value.name);
    };

    return {
      category,
      erros,
      saveCategory,
      getSlug,
    };
  },
};
</script>
