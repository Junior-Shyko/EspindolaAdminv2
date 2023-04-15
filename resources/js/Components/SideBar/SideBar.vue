<script setup>
import { Link, router } from '@inertiajs/vue3'
</script>
<template>
  <div>
    <v-navigation-drawer v-model="drawer">
      <!-- <v-sheet color="grey-lighten-4" class="pa-4">
            <v-avatar class="mb-4" color="grey-darken-1" size="64"></v-avatar>

            <div>john@google.com</div>
          </v-sheet> -->
      <v-card class="mx-auto" color="grey-lighten-4">
        <v-avatar
          class="mb-4"
          color="grey-darken-1"
          size="64"
          style="margin-left: 100px; margin-top: 10px"
        >
        </v-avatar>
        <v-card-title class="flex-just-center">
          {{ $page.props.auth.user.name }}
        </v-card-title>
      </v-card>
      <v-divider></v-divider>

      <v-list v-model:opened="open">
        <v-list-item prepend-icon="fas fa-home" title="Home"></v-list-item>

        <v-list-group value="Users">
          <template v-slot:activator="{ props }">
            <v-list-item
              v-bind="props"
              prepend-icon="fas fa-circle-user"
              title="Usuarios"
              style="font-style: 10px"
            ></v-list-item>
          </template>

          <v-list-group value="Admin">
            <template v-slot:activator="{ props }">
              <v-list-item
                v-bind="props"
                prepend-icon="fas fa-table-columns"
                title="Admin"
                style="font-style: 10px"
              ></v-list-item>
            </template>

            <v-list-item
              v-for="([title, icon], i) in admins"
              :key="i"
              :title="title"
              :prepend-icon="icon"
              :value="title"
            ></v-list-item>
          </v-list-group>

          <v-list-group value="Actions">
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props" title="Imóveis"></v-list-item>
            </template>

            <v-list-item
              v-for="([title, icon], i) in cruds"
              :key="i"
              :value="title"
              :title="title"
              :prepend-icon="icon"
            ></v-list-item>
          </v-list-group>
        </v-list-group>
        <v-list-item prepend-icon="fas fa-home">
          <Link :href="route('contato-site')" >
            Contato
          </Link>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>


export default {
  data: () => ({
    drawer: null,
    open: ["Users"],
    admins: [
      ["Gerenciar", "fas fa-user-pen"],
      ["Config", "fas fa-gear"],
    ],
    cruds: [
      ["Imóveis", "fas fa-home"],
      ["Add Imoveis", "fas fa-plus"],
      ["Chave", "fas fa-key"],
      ["Vistoria", "fas fa-pen-to-square"],
    ],
  }),
  watch: {
    group() {
      this.drawer = false;
    },
  },
};
</script>

<style>
.flex-just-center {
  display: flex;
  justify-content: center;
}
.v-list-item--density-default.v-list-item--one-line {
  min-height: 5px !important;
}
</style>