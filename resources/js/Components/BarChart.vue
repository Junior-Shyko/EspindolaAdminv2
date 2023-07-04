<script setup>
const props = defineProps({
  valueNumber : Number
})
</script>


<template>
    <Doughnut
      id="my-chart-id"
      :options="chartOptions"
      :data="chartData"
      width="150px !important;"
    />
  </template>
  
  <script>
  import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement, CategoryScale, LinearScale } from 'chart.js'
  import { Doughnut } from 'vue-chartjs'
  
  ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale, LinearScale)
  
  export default {
    name: 'BarChart',
    components: { Doughnut },
    data() {
      return {
        valuePlus : this.valueNumber + 40,
        chartData: {
          // labels: [ 'January', 'February', 'March' ],
          datasets: [ { 
            backgroundColor: ['#4466F2', '#c3c3c3'],
            data: [75, 25] } 
          ]
        },
        chartOptions: {
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    created() {
      this.calcPlus()
    },
    methods: {
      calcPlus() {
        console.log(this.valuePlus)
      }
    }
  }
  </script>
  