<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
  <div>
    <v-list-group :value="valueGroup" class="size-icon">
      <template v-slot:activator="{ props }">
        <v-list-item
          v-bind="props"
          :title="nameGroup"
          :prepend-icon="iconGroup"
        ></v-list-item>
      </template>

      <v-list-item v-for="(menu, i) in itemsList" :key="i">
        <template v-slot:prepend>
          <v-icon :icon="menu.icon" size="sm"></v-icon>
        </template>
        <v-list-item-title>
          <Link :href="route(menu.link)">
            {{ menu.title }}
          </Link>
        </v-list-item-title>
      </v-list-item>
    </v-list-group>
  </div>
</template>

<script>
export default {
  // props:['listItems', 'namegroup'],
  components: {
    Link
  },
  props: {
    listItems: Object,
    titleGroup: String,
    iconGroup: String,
  },
  data() {
    return {
      itemsList: this.listItems,
      nameGroup: this.titleGroup,
      iconGroup: this.iconGroup,
    };
  },
  created() {
    console.log(this.iconGroup);
  },
};
</script>

<style>
</style>