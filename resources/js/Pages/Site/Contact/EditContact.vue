<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import FormContact from "./FormContact.vue";
defineProps({ editContact: Object })
</script>
<template>
  <AppLayout title="Contato">
    <div class="d-flex flex-column">
      <v-card
        title="Editar Contato"
        subtitle="Editar as informação da pagina de contato do site"
      >
     
        <FormContact :typeForm="'edicao'" :contactData="contactData" />
      </v-card>
    </div>
  </AppLayout>
</template>

<script>
export default {
    data:() => {
        return {
            contactData: String
        }
    },
    created() {
        this.contactData = this.editContact
    }
};
</script>

<style>
</style>