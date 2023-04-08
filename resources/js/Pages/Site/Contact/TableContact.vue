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
            key: 'name',
          },
          { title: 'Logradouro', align: 'end', key: 'calories' },
          { title: 'Número', align: 'end', key: 'fat' },
          { title: 'Comp.', align: 'end', key: 'carbs' },
          { title: 'Bairro', align: 'end', key: 'protein' },
          { title: 'Cidade', align: 'end', key: 'iron' },
          { title: 'Actions', key: 'actions', sortable: false },
        ],
        desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1',
          },
          {
            name: 'Jelly bean',
            calories: 375,
            fat: 0.0,
            carbs: 94,
            protein: 0.0,
            iron: '0',
          },
          {
            name: 'KitKat',
            calories: 518,
            fat: 26.0,
            carbs: 65,
            protein: 7,
            iron: '6',
          },
          {
            name: 'Eclair',
            calories: 262,
            fat: 16.0,
            carbs: 23,
            protein: 6.0,
            iron: '7',
          },
          {
            name: 'Gingerbread',
            calories: 356,
            fat: 16.0,
            carbs: 49,
            protein: 3.9,
            iron: '16',
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
            iron: '1',
          },
          {
            name: 'Lollipop',
            calories: 392,
            fat: 0.2,
            carbs: 98,
            protein: 0,
            iron: '2',
          },
          {
            name: 'Cupcake',
            calories: 305,
            fat: 3.7,
            carbs: 67,
            protein: 4.3,
            iron: '8',
          },
          {
            name: 'Honeycomb',
            calories: 408,
            fat: 3.2,
            carbs: 87,
            protein: 6.5,
            iron: '45',
          },
          {
            name: 'Donut',
            calories: 452,
            fat: 25.0,
            carbs: 51,
            protein: 4.9,
            iron: '22',
          },
        ],
    }
  },
  methods: {
    editItem (item) {
       console.log({item})
      },

      deleteItem (item) {
        console.log({item})
      },
  }

};
</script>

<style>
</style>