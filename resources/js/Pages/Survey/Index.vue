<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from '@inertiajs/vue3'

</script>
<template>
    <AppLayout>
        <Head title="Vistoria" />
        <div>
            <v-row>
                <v-col cols="12" md="2">
                   
                </v-col>
                <v-col cols="12" md="8">

                </v-col>
                <v-col cols="12" md="2">
                    <v-btn
                    color="primary"
                    >
                    Pesquisar
                    </v-btn>
                </v-col>
                
            </v-row>
         <v-row>
            <v-data-table
                v-model:items-per-page="itemsPerPage"
                :headers="headers"
                :items="desserts"
                item-value="name"
                class="elevation-1"
            ></v-data-table>
         </v-row>
            
        </div>
    </AppLayout>
</template>

<script>
export default {
    data () {
      return {
        itemsPerPage: 5,
        headers: [
          {
            title: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            key: 'name',
          },
          { title: 'Calories', align: 'end', key: 'calories' },
          { title: 'Fat (g)', align: 'end', key: 'fat' },
          { title: 'Carbs (g)', align: 'end', key: 'carbs' },
          { title: 'Protein (g)', align: 'end', key: 'protein' },
          { title: 'Iron (%)', align: 'end', key: 'iron' },
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
        ]
      }
    }
}
</script>

<style>

</style>