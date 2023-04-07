<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

</script>

<template>
  <AppLayout title="Contato">
    <div>
      <v-card
        title="Contato do site"
        subtitle="Informação completa da imobilária"
      >
        <v-card-item>
          <v-divider></v-divider>
          <v-container class="">
            <v-row no-gutters>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="CEP" v-model="cep" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Logradouro" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Numero" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Complemento" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Bairro" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Cidade" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Estado" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="E-mail" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="CRECI/CE" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="CNPJ" variant="solo"></v-text-field>
              </v-col>
              <v-row class="flex justify-end">
                <v-btn color="primary" variant="flat">
                  Salvar
                  <v-icon icon="fa fa-floppy-disk"></v-icon>
                </v-btn>
              </v-row>
            </v-row>
            <v-row>
              <v-col>
                <span class="font-bold">Números de contato: </span>
                <v-btn color="primary"  @click="dialog = true" variant="text"> Adicionar </v-btn>
                <v-list lines="one">
                  <v-list-item title="(85) 99999-8765" subtitle="Fone Fixo">
                  </v-list-item>
                  <v-list-item
                    title="(85) 99999-8765"
                    subtitle="Fone Celular e Whatsapp"
                  >
                  </v-list-item>
                </v-list>
              </v-col>
            </v-row>
          </v-container>
        </v-card-item>
      </v-card>
      <v-dialog
        v-model="dialog"
        width="auto"
      >
        <v-card>
          <v-card-title>
            Cadastrar contato telefônico
          </v-card-title>
          <v-card-text>
           <v-row> 
            <v-col cols="12" xs="12" sm="12" md="12">
                <span>Qual o Número?</span>
                <v-text-field variant="outlined"></v-text-field>
                <span>Qual o tipo?</span>
                <v-select

   
                variant="outlined"
                :items="['Fixo', 'Celular', 'Whatsapp']"
                ></v-select>
            </v-col>
           </v-row>
          </v-card-text>
          <v-card-actions>
            <v-btn
              color="secound"
              variant="outlined"
              @click="dialog = false"
            >
              Fechar
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </AppLayout>
</template>

<script>

export default {
    data: () =>({
        cep: '',
        dialog: false,
    }),
   
}
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