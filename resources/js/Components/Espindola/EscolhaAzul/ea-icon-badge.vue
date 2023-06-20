<script setup>
const props = defineProps({
  icon: {
    type: String,
    default: null,
  },
  idlegal: {
    type: Number,
    default: null,
  },
  title: { type: String, default: "Visualizar" },
  badge: {
    type: Boolean,
    default: false,
  },
  typeMethod: { type: String, default: null },
});
</script>
<template>
  <div>
    <v-badge color="primary" :content="countFilesImages" v-if="props.badge">
      <v-icon
        :icon="`fas ${props.icon}`"
        size="small"
        class="m-1"
        @click="redirectItens(props.typeMethod)"
        :title="props.title"
      >
      </v-icon>
    </v-badge>
    <v-icon v-if="props.badge == false"
        :icon="`fas ${props.icon}`"
        size="small"
        class="m-1"
        @click="redirectItens(props.typeMethod)"
        :title="props.title"
      >
      </v-icon>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      countFilesImages: 0,
      api_ea: import.meta.env.VITE_ESPINDOLA_EA,
      api_escolhaazul: import.meta.env.VITE_API_ESPINDOLA_EA,
    };
  },
  methods: {
    redirectItens(typeMethod) {
      console.log({typeMethod})
      switch ((typeMethod)) {
        case "eyeProposal":
          window.open(
            this.api_ea + "?action=view-legal&id=" + btoa(this.idlegal),
            "_blank"
          );
          break;
        case "analysisProposal":
            window.open(this.api_ea + "view/report/proposal_pj_adm.php?id=" + btoa(this.idlegal), '_blank');
          break;
        case "imageProposal":
            window.open(route('imagem.tipo.profile', [this.idlegal, 'pj' , 'inquilino']), '_blank')
          break;

        default:
          break;
      }
    },
    countFiles(item) {
      axios
        .get(this.api_escolhaazul + "/api/proposal-image/pj/" + this.idlegal)
        .then((res) => {
          this.countFilesImages = Object.keys(res.data).length;
        });
    },
  },
  created() {
    this.countFiles(this.idlegal);
  },
};
</script>

<style>
</style>