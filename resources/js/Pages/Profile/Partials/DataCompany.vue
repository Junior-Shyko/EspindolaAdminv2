<template>
  <div class="inline-flex">
    <h1 class="text-2xl p-2">Dados da Empresa</h1>
  </div>
  <v-list>
    <v-list-item
            prepend-avatar="https://cdn.vuetifyjs.com/images/john.png"
            title="Tillman - Jacobs"
            subtitle="tillman.com"
          >
            <template v-slot:append>
              <v-btn
                title="Acessar Página da empresa"
                size="small"
                variant="text"
                icon="far fa-edit"
              ></v-btn>
            </template>
          </v-list-item>
          <v-list-item>
            <p class="mt-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos non qui soluta reiciendis nihil animi
                 ex perferendis omnis repudiandae necessitatibus ut suscipit, totam culpa est sint praesentium dicta
                  inventore delectus.
            </p>
            <p class="mt-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos non qui soluta reiciendis nihil animi
                 ex perferendis omnis repudiandae necessitatibus ut suscipit, totam culpa est sint praesentium dicta
                  inventore delectus.
            </p>
          </v-list-item>
  </v-list>
</template>

<script>
export default {

}
</script>

<style>

</style>