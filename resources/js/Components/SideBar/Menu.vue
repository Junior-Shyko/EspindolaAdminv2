<script setup>


</script>
<template>
  <div>
    <v-list-item
        v-for="(menu, i) in adminsMenu" :key="i"
        :title="menu.title"
        :prepend-icon="menu.icon"
        :value="menu.title"
        size="x-small"
    ></v-list-item>
  </div>
</template>

<script>
export default {
    setup() {
        const adminsMenu = [
                
                {title : 'Gerenciar', link:"dashboard", icon: "fas fa-user-pen"},
                {title : "Config", link:"dashboard", icon: "fas fa-gear"},
            ]
            return {
                adminsMenu
            }
    },
    data: () => {
        return {
            
        }    
    },

}

</script>

<style>

</style>