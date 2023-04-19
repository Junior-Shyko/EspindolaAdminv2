<script setup>
import { Link, router } from "@inertiajs/vue3";
</script>
<template>
  <div>
    <v-navigation-drawer v-model="drawer" color="blue-grey-darken-2">
      <!-- <v-sheet color="grey-lighten-4" class="pa-4">
            <v-avatar class="mb-4" color="grey-darken-1" size="64"></v-avatar>

            <div>john@google.com</div>
          </v-sheet> -->
      <v-card class="mx-auto" color="blue-grey-darken-2">
        <v-avatar
          class="mb-4"
          color="grey-darken-1"
          size="64"
          style="margin-left: 100px; margin-top: 10px"
        >
          <v-img
            src=" https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqNbKVTGAWlEe65Ao0ILXrAQzupIZOpp6qYw&usqp=CAU"
            alt="{{ $page.props.auth.user.name }}"
          ></v-img>
        </v-avatar>
        <v-card-title class="flex-just-center">
          {{ $page.props.auth.user.name }}
        </v-card-title>
      </v-card>
      <v-divider></v-divider>

      <v-list v-model:opened="open">
        <v-list-item prepend-icon="fas fa-home" title="Home" style="font-size:small"></v-list-item>

        <v-list-group value="Users" style="font-size:small">
          <template v-slot:activator="{ props }">
            <v-list-item
              v-bind="props"
              prepend-icon="fas fa-circle-user"
              title="Usuarios"
            ></v-list-item>
          </template>

          <v-list-group value="Admin">
            <template v-slot:activator="{ props }">
              <v-list-item
                v-bind="props"
                prepend-icon="fas fa-table-columns"
                title="Admin"
                size="sm"
              >
            </v-list-item>
            </template>

            <v-list-item
              v-for="([title, icon], i) in admins"
              :key="i"
              :title="title"
              :prepend-icon="icon"
              :value="title"
              size="x-small"
            ></v-list-item>
          </v-list-group>

          <!-- <v-list-group value="Actions">
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
          </v-list-group> -->
        </v-list-group>
        <v-list-item>
          <template v-slot:prepend>
            <v-icon icon="fas fa-calendar" size="sm"></v-icon>
          </template>
          <v-list-item-title>
            <Link :href="route('contato-site')"> Contato </Link>
          </v-list-item-title>
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
.v-list-group {
    --list-indent-size: 10px;
    --parent-padding: var(--indent-padding);
    --prepend-width: 20 px;
}
</style>  