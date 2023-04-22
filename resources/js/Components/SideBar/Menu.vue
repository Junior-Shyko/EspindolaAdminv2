<script setup>
import GroupList from "./GroupList.vue";
</script>
<template>
  <div>
    <GroupList
      valueGroup="imoveis"
      titleGroup="Imóveis"
      iconGroup="fas fa-home"
      :listItems="adminsMenu"
    />
    <GroupList
      valueGroup="EscolhaAzul"
      titleGroup="Escolha Azul"
      iconGroup="fas fa-file-lines"
      :listItems="escolha"
    />
    <GroupList
      valueGroup="site"
      titleGroup="Site"
      iconGroup="fas fa-earth-americas"
      :listItems="site"
    />
  </div>
</template>

<script>
export default {
  components: {
    GroupList,
  },
  data: () => {
    return {
      escolha: [
        {
          title: "Proposta PF",
          link: "dashboard",
          icon: "fas fa-file-powerpoint",
        },
        {
          title: "Cadastro PF",
          link: "dashboard",
          icon: "fas fa-file-powerpoint",
        },
        {
          title: "Proposta PJ",
          link: "dashboard",
          icon: "fas fa-file-pen",
        },
        {
          title: "Cadastro PJ",
          link: "dashboard",
          icon: "fas fa-file-pen",  
        },
      ],
      adminsMenu : [
        {
            title: "Ger. Imóveis",
            link: "dashboard",
            icon: "fas fa-house-circle-check",
        },
        {
            title: "Chave",
            link: "dashboard",
            icon: "fas fa-key",
        },
        {
            title: "Vistoria",
            link: "vistoria",
            icon: "fas fa-file",
        },
      ],
      site: [
        {
            title: "Equipe",
            link: "dashboard",
            icon: "fas fa-users"
        },
        {
            title: "Contato",
            link: "contato-site",
            icon: "fas fa-envelope",
          
        },
      ]
    };
  },
};
</script>

<style>
.size-icon {
  font-size: x-small;
}
</style>