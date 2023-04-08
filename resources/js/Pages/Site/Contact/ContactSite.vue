<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import TableContact from "@/Pages/Site/Contact/TableContact.vue";
import FormContact from "./FormContact.vue";

</script>

<template>
  <AppLayout title="Contato">
    <div>
      <v-card>
        <v-row>
          <v-btn
            class="m-[18px]"
            @click="dialog = true"
            color="indigo-lighten-1"
          >
            adicionar contato
            <v-icon icon="fas fa-plus" size="small" class="ml-2"></v-icon>
          </v-btn>
        </v-row>
        <v-card-item>
          <TableContact />
        </v-card-item>
      </v-card>
      <v-dialog
        v-model="dialog"
        transition="dialog-bottom-transition"
        width="auto"
      >
        <v-card
          title="Contato do site"
          subtitle="Informação completa da imobilária"
        >
          <FormContact />
        </v-card>
      </v-dialog>
    </div>
  </AppLayout>
</template>

<script>
export default {

  data: () => ({
    cep: "",
    dialog: false,
  }),
};
</script>
<style>
.v-select .v-field .v-field__input > input {
  align-self: flex-start;
  /* opacity: 1; */
  flex: 0 0;
  position: absolute;
  width: 100%;
  transition: none;
  pointer-events: none;
}
</style>