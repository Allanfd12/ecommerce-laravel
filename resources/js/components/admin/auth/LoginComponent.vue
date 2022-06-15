<template>
  <section>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div
            class="card background-custom text-white"
            style="border-radius: 1rem"
          >
            <div class="card-body px-5 py-4 text-center">
              <form class="md-5 mt-md-4" @submit.prevent="logar">
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-3">
                  Por favor insira seu login e senha
                </p>
                <div class="mt-2 mb-6 text-sm text-danger">
                  <strong>{{ erros }}</strong>
                </div>
                <div class="form-outline form-white mb-4">
                  <label class="form-label">Email</label>
                  <input
                    type="email"
                    required
                    v-model="form.email"
                    class="form-control form-control-lg"
                    placeholder="Email"
                  />
                </div>

                <div class="form-outline form-white mb-4">
                  <label class="form-label">Senha</label>
                  <input
                    type="password"
                    required
                    v-model="form.password"
                    class="form-control form-control-lg"
                    placeholder="Senha"
                  />
                </div>

                <button
                  class="btn btn-outline-light btn-lg px-5 mt-4"
                  type="submit"
                >
                  Login
                </button>
              </form>

              <div>
                <p class="mb-0">
                  Não tem uma conta?

                  <router-link
                    :to="{ name: 'register' }"
                    class="text-white-50 fw-bold"
                  >
                    Registrar
                  </router-link>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.background-custom {
  background: #10000ae1;
}
</style>

<script>
import { reactive } from "vue";
import useAuthentication from "../../../composable/authentication";

export default {
  setup() {
    const form = reactive({
      email: "",
      password: "",
    });
    const { erros, login } = useAuthentication();

    const logar = async () => {
      await login({ ...form });
    };

    return {
      form,
      logar,
      erros,
    };
  },
};
</script>
