<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ListImage from "./ListImage.vue";
//registro do que vem pelo controlador
const props = defineProps({
    id: Number 
});
</script>
<template>
  <AppLayout>
    <div>
      <div class="flex justify-evenly">
        <v-card width="100%">
          <v-card-title>
            <div class="lg:flex justify-between items-center">
              <p class="text-2xl font-semibold lg:mb-0 text-sky-600 m-1">         
                Arquivos da proposta
              </p>
            </div>
          </v-card-title>
          <v-row no-gutters>
            <!-- <v-col cols="12" md="4">
              <v-btn>Baixar arquivos</v-btn>
            </v-col>
            <v-col cols="12" md="4">
              <v-btn>Upload</v-btn>
            </v-col>
            <v-col cols="12" md="4">
              <v-btn
              >
              Atualizar
            </v-btn>
            </v-col> -->
            <v-divider class="mt-2"></v-divider>
          </v-row>
        </v-card>
      </div>

      <v-row no-gutters>
        <v-divider inset class="mb-2"></v-divider>
        <v-col cols="12"  v-for="(item, index) in list" :key="index" md="4">
          <ListImage 
            :namefile="item.files_name"
            :date="item.files_date"
            :image="`${api_ea + 'public/img/upload/' + item.files_name}`" />
        </v-col>
      </v-row>
    </div>
  </AppLayout>
</template>

<script>
export default {
    props : {

    },
    data:() => {
       return {
            list: Array,
            api_ea : import.meta.env.VITE_API_ESPINDOLA_EA
           
       }
    },
    mounted() {
        this.getListPJ()
    },
    methods: {
            getListPJ() {
                axios.get(this.api_ea + '/api/proposal-image/pj/' + this.id)
                .then((res) => {
                    console.log({res})
                    this.list = res.data
                })
                .catch((err) => {
                    
                })
            }
        }
};
</script>

<style>
</style>