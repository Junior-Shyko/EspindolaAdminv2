<script setup>
const props = defineProps({
  namefile: {
    type: String,
    default: null,
  },
  date: {
    type: String,
    default: null,
  },
  image: String,
});
</script>

<template>
  <div>
    <div class="items-center">
      <v-card max-width="344" class="m-5">
        <div v-if="props.namefile.substr(-3) == 'pdf' ||
          props.namefile.substr(-3) == 'PDF'">
          <iframe :src="props.image" height="200px"></iframe>
        </div>
        <v-img
          v-if="props.namefile.substr(-3) == 'png' || 
          props.namefile.substr(-3) == 'jpg' ||
          props.namefile.substr(-3) == 'jpeg'" 
          :src="props.image"
          height="200px"
          cover
        ></v-img>

        <v-card-title>
          {{ props.namefile }}
        </v-card-title>

        <v-card-subtitle> Data: {{ props.date }} </v-card-subtitle>

        <v-card-actions>
          <v-btn
            color="primary"
            :title="`Baixar o arquivo ${props.namefile}`"
            variant="flat"
            :href="props.namefile"
            download
          >
            Baixar
          </v-btn>
          <v-btn
            :href="props.image"
            :title="`Visualizar ampliado o arquivo ${props.namefile}`"
            target="_blank"
            color="secondary"
            variant="flat"
          >
            Ampliar
          </v-btn>
          <v-spacer></v-spacer>

          <!-- <v-btn color="blue-grey-darken-3" variant="tonal" >
                    
                  </v-btn> -->
          <!-- <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn icon="fas fa-ellipsis-vertical" v-bind="props"></v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(item, i) in items"
                :key="i"
              >
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu> -->
        </v-card-actions>
      </v-card>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    items: [
      { title: "Click Me" },
      { title: "Click Me" },
      { title: "Click Me" },
      { title: "Click Me 2" },
    ],
    api_ea: import.meta.env.VITE_API_ESPINDOLA_EA,
  }),
  created() {
    console.log(this.namefile.substr(-3));
  },
};
</script>

<style>
</style>