<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import api from "@/Components/server/api";
import moment from "moment";
</script>
<template>
  <AppLayout>
    <Head title="Vistoria" />
    <div>
      <v-row class="mb-4">        
        <v-card 
          width="100%" style="display: flex">        
          <v-col cols="12" xs="12" md="2">
            <v-select
              @update:modelValue="handleClick"              
              :items="itemsSelect"
              label="Pesquisar por"
              item-title="label"
              item-value="value"              
              return-object
              single-line
              hint="Pesquisa avançada"
              persistent-hint
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
        <v-card width="100%">
          <v-card-title>

            <v-text-field
              v-model="search"
              append-icon="fa fa-magnifying-glass"
              label="Pesquisa rápida"
              single-line
              hint="Se não encontrar sua pesquisa, tente na avançada."
              persistent-hint
              variant="solo"
              density="compact"
            ></v-text-field>
          </v-card-title>
          <v-data-table
            v-model:items-per-page="itemsPerPage"
            :headers="headers"
            :items="desserts"
            item-value="name"
            class="elevation-3"
            :search="search"
          >
            <template v-slot:item.survey_address_immobile="{ item }">
              <span
                >{{ item.raw.survey_address_immobile.substr(0, 50) }}...</span
              >
            </template>
            <template v-slot:item.survey_date="{ item }">
              <span>{{ dateTime(item.raw.survey_date) }}</span>
            </template>
            <template v-slot:item.survey_inspetor_name="{ item }">
              <span>{{ item.raw.survey_inspetor_name.substr(0, 15) }}...</span>
            </template>
            <template v-slot:item.survey_status="{ item }">
              <span
                class="badge-status"
                v-if="item.raw.survey_status == 'Finalizada'"
                >{{ item.raw.survey_status }}</span
              >
              <span class="badge-rascunho" v-else>{{
                item.raw.survey_status
              }}</span>
            </template>
            <template v-slot:item.actions="{ item }">
              <v-icon
                icon="fas fa-edit"
                size="small"
                class="m-1"
                @click="editItem(item.raw)"
                title="Editar"
              >
              </v-icon>

              <v-icon
                icon="fas fa-print"
                size="small"
                class="m-1"
                title="Imprimir"
              ></v-icon>
              <v-icon
                icon="fa fa-copy"
                size="small"
                class="m-1"
                title="Duplicar"
              ></v-icon>
              <v-icon
                icon="fas fa-image"
                size="small"
                class="m-1"
                title="Imagens de ambiente"
              ></v-icon>

              <v-icon
                icon="fas fa-trash"
                size="small"
                color="error"
                class="m-1"
                @click="deleteItem(item.raw)"
                title="Excluir"
              ></v-icon>
            </template>
          </v-data-table>
        </v-card>
      </v-row>
    </div>
  </AppLayout>
</template>

<script>
export default {
  data() {
    return {
      search: '',
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
      itemsPerPage: 10,
      headers: [
        {
          title: "Código",
          align: "start",
          sortable: true,
          key: "survey_code",
        },
        { title: "Imóvel", align: "end", key: "survey_address_immobile"},
        { title: "Data", align: "end", key: "survey_date" },
        { title: "Tipo", align: "end", key: "survey_type" },
        { title: "Vistoriador", align: "end", key: "survey_inspetor_name" },
        { title: "Status", align: "end", key: "survey_status" },
        { title: "Actions", key: "actions", sortable: false },
      ],
      desserts: [],
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
  created() {
    this.getSurveyAll();
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
      api
        .get("api/vistoria/all")
        .then((res) => {
          this.desserts = res.data;
        })
        .catch((err) => {
          console.log({ err });
        });
    },
    dateTime(value) {
      return moment(value).format("DD/MM/YYYYY");
    },
  },
  computed: {},
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
.badge-status {
  background: rgb(0, 105, 92);
  padding: 5px;
  border-radius: 15px;
  color: white;
  font-size: 13px;
}
.badge-rascunho {
  background: #fb8c00;
  padding: 5px;
  border-radius: 15px;
  color: rgb(37, 23, 23);
  font-size: 13px;
}
</style>