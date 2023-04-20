<script setup>
import api from "@/Components/server/api"
import { Link } from "@inertiajs/vue3";
import { useToast, POSITION } from "vue-toastification";

const tableData = [
  {
    date: "2016-05-03",
    name: "Tom",
    address: "No. 189, Grove St, Los Angeles",
  },
  {
    date: "2016-05-02",
    name: "Tom",
    address: "No. 189, Grove St, Los Angeles",
  },
  {
    date: "2016-05-04",
    name: "Tom",
    address: "No. 189, Grove St, Los Angeles",
  },
  {
    date: "2016-05-01",
    name: "Tom",
    address: "No. 189, Grove St, Los Angeles",
  },
];


</script>
<template>
  <div>
    <v-data-table
      v-model:items-per-page="itemsPerPage"
      :headers="headers"
      :items="desserts"
      item-value="name"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-dialog v-model="dialogDelete" width="50%">
          <v-card>
            <v-card-title class="text-h5"> Excluir! </v-card-title>
            <v-card-text>
              Deseja realmente excluir esse registro?
            </v-card-text
            >
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-row>
                <v-col cols="6" xs="6" sm="6" md="6">
                  <div class="flex justify-start">
                    <v-btn
                      color="error"
                      variant="flat"
                      @click="deleteContactApi"
                    >
                      Sim
                    </v-btn>
                  </div>
                </v-col>

                <v-col cols="6" xs="6" sm="6" md="6">
                  <div class="flex justify-end">
                    <v-btn
                      color="grey-lighten-2"
                      variant="flat"
                      @click="dialogDelete = false"
                    >
                      Nao
                    </v-btn>
                  </div>
                </v-col>
              </v-row>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-btn color="success" size="small" class="me-2" variant="text">
          <Link :href="route('editar-contato', item.raw.id)">
            <v-icon icon="fas fa-edit"></v-icon>
          </Link>
        </v-btn>

        <v-btn
          color="error"
          size="small"
          class="me-2"
          variant="text"
          @click="deleteItem(item.raw)"
        >
          <v-icon icon="fas fa-trash"></v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script>

export default {
  data() {
    return {
      itemsPerPage: 10,
      headers: [
        {
          title: "CEP",
          align: "start",
          sortable: false,
          key: "cep",
        },
        { title: "Logradouro", align: "end", key: "address" },
        { title: "Número", align: "end", key: "number" },
        { title: "Comp.", align: "end", key: "complements" },
        { title: "Bairro", align: "end", key: "district" },
        { title: "Cidade", align: "end", key: "city" },
        { title: "Actions", key: "actions", sortable: false },
      ],
      desserts: [],
      dialogDelete: false,
      idContactDelete: Number
    };
  },
  created() {
    this.getContact();
  },
  methods: {
    editItem(item) {
    },

    deleteItem(item) {
      // console.log({ item });
      this.dialogDelete = true;
      this.idContactDelete = item.id
    },

    getContact() {
      axios
        .get("http://localhost:8000/api/todos-contatos")
        .then((res) => {
          console.log({ res });
          this.desserts = res.data;
        })
        .catch((err) => {
          console.log({ err });
        });
    },
    deleteContactApi() {
      api.delete('excluir-contato/' + this.idContactDelete)
      .then((res) => {
        this.dialogDelete = false
        useToast().success("Registro excluido com sucesso", {
          timeout: 4000,
          position: POSITION.TOP_CENTER
        });        
        this.getContact();  
      })
      .catch((err) => {
        console.log({err})
      })
    }
  },
  watch: {
    //   dialog (val) {
    //     val || this.close()
    //   },
    reloadTable(val) {
      
      if(val == 'reload-table') {
        this.getContact()
        console.log({val})
      }
    },
    dialogDelete(val) {
      // val || this.closeDelete()
      console.log(this.dialogDelete);
      console.log({ val });
    },
  },
};
</script>

<style>
</style>