<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ListImage from "./ListImage.vue";

</script>
<template>
  <AppLayout>
    <div>
      <div class="flex justify-evenly">
        {{ $page.props }}
        <v-card width="100%">
          <v-card-title>
            <div class="lg:flex justify-between items-center">
              <p class="text-2xl font-semibold lg:mb-0 text-sky-600">
                Arquivos da proposta
              </p>
            </div>
          </v-card-title>
          <v-row no-gutters>
            <v-col cols="12" md="4">
              <v-btn>Baixar arquivos</v-btn>
            </v-col>
            <v-col cols="12" md="4">
              <v-btn>Upload</v-btn>
            </v-col>
            <v-col cols="12" md="4">
              <v-btn>Atualizar</v-btn>
            </v-col>
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
            :image="`${'https://espindolaimobiliaria.com.br/escolhaazul/public/img/upload/' + item.files_name}`" />
        </v-col>
      </v-row>
    </div>
  </AppLayout>
</template>

<script>
export default {    
    data:() => {
       return {
            list: Array
       }
    },
    mounted() {
        this.getListPJ()
    },
    methods: {
            getListPJ() {
                axios.get('https://espindolaimobiliaria.com.br/escolhaazul/api/proposal-image/pj/1593')
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