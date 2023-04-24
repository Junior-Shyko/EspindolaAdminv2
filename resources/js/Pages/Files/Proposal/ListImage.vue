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
    image: String

});

</script>

<template>
  <div>

    <div class="items-center">
            <v-card max-width="344" class="m-5">
                <v-img
                  :src="props.image "
                  height="200px"
                  cover
                ></v-img>

                <v-card-title>
                    {{ props.namefile }}
                </v-card-title>

                <v-card-subtitle> Data: {{ props.date }} </v-card-subtitle>

                <v-card-actions>
                  <v-btn color="primary" variant="flat">
                    Baixar
                  </v-btn>

                  <v-spacer></v-spacer> 

                  <v-btn color="blue-grey-darken-3" variant="tonal">
                    Visualizar
                  </v-btn>
                </v-card-actions>

               
              </v-card>
          </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>