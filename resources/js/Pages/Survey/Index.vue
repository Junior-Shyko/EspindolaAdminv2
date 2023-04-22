<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import api from '@/Components/server/api';

</script>
<template>
  <AppLayout>
    <Head title="Vistoria" />
    <div>
      <v-row class="mb-4">
        <v-card width="100%" style="display: flex">
          <v-col cols="12" xs="12" md="2">
            <v-select
              @update:modelValue="handleClick"
              :hint="`${optionInitSelect.label}, ${optionInitSelect.value}`"
              :items="itemsSelect"
              label="Pesquisar por"
              item-title="label"
              item-value="value"
              persistent-hint
              return-object
              single-line
              hide-details
              v-model="optionInitSelect"
            ></v-select>
          </v-col>
          <v-col cols="12" xs="12" md="8">
            <v-text-field
              v-if="!showSelect"
              v-model="inputValue"
              :label="infoPlaceholder"
              :disabled="disabledBtnSeach"
              variant="solo"
            ></v-text-field>
            <v-select
              v-if="showSelect"
              :hint="`${selectOptions.label}, ${selectOptions.value}`"
              :items="options"
              :label="infoPlaceholder"
              item-title="label"
              item-value="value"
              persistent-hint
              return-object
              single-line
              hide-details
              v-model="selectOptions"
            ></v-select>
          </v-col>
          <v-col cols="12" xs="12" md="2">
            <div class="flex justify-center mt-2">
              <v-btn
                prepend-icon="fas fa-search"
                color="primary"
                :disabled="disabledBtnSeach"
              >
                Pesquisar
              </v-btn>
            </div>
          </v-col>
        </v-card>
      </v-row>
      <v-row>
        <v-data-table
          v-model:items-per-page="itemsPerPage"
          :headers="headers"
          :items="desserts"
          item-value="name"
          class="elevation-3"
        >
          <template v-slot:item.actions="{ item }">
            <v-btn
              size="small"
              class="me-2 elevation-3"
              @click="editItem(item.raw)"
            >
              <v-icon icon="fas fa-edit"></v-icon>
            </v-btn>
            <v-btn
              size="small"
              color="error"
              class="me-2 elevation-3"
              @click="deleteItem(item.raw)"
            >
              <v-icon icon="fas fa-trash"></v-icon>
            </v-btn>
          </template>
        </v-data-table>
      </v-row>
    </div>
  </AppLayout>
</template>

<script>
export default {
  data() {
    return {
      inputValue: "",
      infoPlaceholder: "Digite a sua pesquisa",
      disabledBtnSeach: true,
      showInput: false,
      options: [],
      items: ["Foo", "Bar", "Fizz", "Buzz"],
      showSelect: false,
      selectOptions: { label: "Pesquisar por", value: "" },
      typeImmobile: [
        { value: "casa", label: "Casa" },
        { value: "apartamento", label: "Apartamento" },
        { value: "loja", label: "Loja" },
      ],
      optionStatus: [
        { value: "Rascunho", label: "Rascunho" },
        { value: "Finalizada", label: "Finalizada" },
      ],

      typeInspector: [
        { value: "João", label: "João" },
        { value: "Maria", label: "Maria" },
      ],
      itemsPerPage: 5,
      headers: [
        {
          title: "Código",
          align: "start",
          sortable: false,
          key: "name",
        },
        { title: "Imóvel", align: "end", key: "calories" },
        { title: "Data", align: "end", key: "fat" },
        { title: "Tipo", align: "end", key: "carbs" },
        { title: "Vistoriador", align: "end", key: "protein" },
        { title: "Status", align: "end", key: "iron" },
        { title: "Actions", key: "actions", sortable: false },
      ],
      desserts: [
        {
          name: "Frozen Yogurt",
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: "1",
        },
      ],
      optionInitSelect: { label: "Pesquisar por", value: "" },
      itemsSelect: [
        { label: "Código", value: "codigo" },
        { label: "Tipo de Imóvel", value: "tipo" },
        { label: "Status da Vistoria", value: "status" },
        { label: "Vistoriador", value: "vistoriador" },
        { label: "Endereço", value: "endereco" },
      ],
    };
  },
  methods: {
    handleClick(value) {
      console.log(value.value);
      switch (value.value) {
        case "codigo":
          this.infoPlaceholder =
            "Digite um código para pesquisa e aperte ENTER";
          this.showInput = true;
          this.disabledBtnSeach = false;
          this.showSelect = false;
          break;
        case "tipo":
          (this.selectOptions = { label: "Qual o tipo?", value: "" }),
            (this.infoPlaceholder = "Escolha um tipo");
          this.options = this.typeImmobile;
          this.showSelect = true;
          this.disabledBtnSeach = true;
          break;
        case "status":
          (this.selectOptions = { label: "Qual o status?", value: "" }),
            (this.infoPlaceholder = "Escolha um status");
          this.showInput = false;
          this.showSelect = true;
          this.options = this.optionStatus;
          this.disabledBtnSeach = true;
          break;
        case "vistoriador":
          (this.selectOptions = {
            label: "Escolha o vistoridor(a)",
            value: "",
          }),
            (this.infoPlaceholder = "Digite o nome do vistoriador");
          this.showInput = false;
          this.showSelect = true;
          this.options = this.typeInspector;
          this.disabledBtnSeach = true;
          break;
        case "endereco":
          this.infoPlaceholder = "Digite um endereço";
          this.labelBtnSearch = "Endereço";
          this.showInput = true;
          this.showSelect = false;
          this.disabledBtnSeach = false;
          break;
      }
    },

    editItem(item) {
      console.log({ item });
    },

    deleteItem(item) {
      console.log({ item });
    },

    getSurveyAll() {
      
    }
  },
};
</script>

<style>
.v-select .v-field .v-field__input > input {
  align-self: flex-start;
  opacity: 0 !important;
  flex: 0 0;
  position: absolute;
  width: 100%;
  transition: none;
  pointer-events: none;
}
</style>