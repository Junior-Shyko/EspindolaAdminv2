<script setup>
const tableData = [
  {
    date: '2016-05-03',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-02',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-04',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-01',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
]
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
  <template v-slot:item.actions="{ item }">      
      <v-btn
      color='success'
      size="small"
      class="me-2"
      variant="text"
      @click="  (item.raw)"
      >
      <v-icon icon="fas fa-edit"></v-icon> 
      </v-btn>

      <v-btn
      color='error'
      size="small"
      class="me-2"
      variant="text"
      @click="deleteItem(item.raw)"
      >
      <v-icon icon="fas fa-trash"></v-icon> 
      </v-btn>
    </template>
    <template v-slot:no-data>
      <v-btn
        color="primary"
        @click="initialize"
      >
        Reset
      </v-btn>
    </template>
</v-data-table>
  </div>
</template>

<script>
export default {
  data () {
    return {
        itemsPerPage: 5,
        headers: [
          {
            title: 'CEP',
            align: 'start',
            sortable: false,
            key: 'cep',
          },
          { title: 'Logradouro', align: 'end', key: 'address' },
          { title: 'Número', align: 'end', key: 'number' },
          { title: 'Comp.', align: 'end', key: 'complements' },
          { title: 'Bairro', align: 'end', key: 'district' },
          { title: 'Cidade', align: 'end', key: 'city' },
          { title: 'Actions', key: 'actions', sortable: false },
        ],
        desserts: []
    }
  },
  created() {
      this.getContact()
  },
  methods: {
    editItem (item) {
       console.log({item})
      },

      deleteItem (item) {
        console.log({item})
      },

      getContact()
      {
        axios.get('http://localhost:8000/api/todos-contatos')
        .then((res) => {
          console.log({res})
          this.desserts = res.data
        })
        .catch((err) => {
          console.log({err})
        })
      }
  }

};
</script>

<style>
</style>