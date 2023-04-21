<script setup>

import Menu from './Menu.vue'
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

        <Menu />
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  props: {
    draw: Boolean
  },
  data: () => ({
    drawer: null,
    open: ["Users"],
    
    cruds: [
      ["Imóveis", "fas fa-home"],
      ["Add Imoveis", "fas fa-plus"],
      ["Chave", "fas fa-key"],
      ["Vistoria", "fas fa-pen-to-square"],
    ],
  }),
  created() {
    this.drawer = this.draw
  },
  watch: {
    group() {
      this.drawer = false;
    },
    draw(val) {
      console.log('side ', val)
      this.drawer = val
      
    }
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