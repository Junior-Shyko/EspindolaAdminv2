<script setup>


</script>
<template>
  <div>
    <v-list-item
        v-for="([title, icon], i) in adminsMenu"
        :key="i"
        :title="title"
        :prepend-icon="icon"
        :value="title"
        size="x-small"
    ></v-list-item>
  </div>
</template>

<script>
export default {
    setup() {
       
    },
    data: () => {
        return {
            adminsMenu : [
                ["Gerenciar", "fas fa-user-pen"],
                ["Config", "fas fa-gear"],
            ]
        }    
    },

}
export const adminsMenu = [
                
    {title : 'Gerenciar', link:"dashboard", icon: "fas fa-user-pen"},
    {title : "Config", link:"dashboard", icon: "fas fa-gear"},
]

</script>

<style>

</style>