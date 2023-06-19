<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import EaIconBadge from "./ea-icon-badge.vue";
import { Head } from "@inertiajs/vue3";
import api from "@/Components/server/api";
</script>
<template>
  <AppLayout>
    <Head title="Vistoria" />
    <div>
        <v-row class="mb-4">
            <v-card 
            width="100%"
            title="Proposta Pessoa Jurídica"
            subtitle="Lista das útimas propostas pessoa jurídica"
            >
            <v-card-title>
                <v-text-field
                v-model="search"           
                append-icon="fa fa-magnifying-glass"
                label="Pesquisa rápida"
                single-line
                variant="solo"
                density="compact"
                ></v-text-field>
                <div class="flex justify-center" v-if="loading">   
                    <v-progress-circular color="primary" indeterminate></v-progress-circular>
                    <span class="text-blue-600 text-sm"> Buscando dados...</span>
                </div>
            </v-card-title>
            <v-data-table
            v-model:items-per-page="itemsPerPage"
            :headers="headers"
            :items="listProposalPJ"
            item-value="name"
            class="elevation-3"
            :search="search"
          >

          <template v-slot:item.actions="{ item }">

            <!-- {{ countFiles(item) }} -->
         
            <EaIconBadge
              :typeMethod="`eyeProposal`"
              :icon="`fa-eye`"
              :idlegal="item.raw.legal_id"
              :title="`Visualizar Arquivos`"
              :badge="false"
            />

            <EaIconBadge 
              :typeMethod="`analysisProposal`"
              :icon="`fa-chart-simple`"
              :idlegal="item.raw.legal_id"
              :title="`Análise de proposta`"
              :badge="false"
            />
            <EaIconBadge
              :typeMethod="`imageProposal`"
              :icon="`fa-image`"
              :idlegal="item.raw.legal_id"
              :title="`Arquivos de propost`"
              :badge="true"
            />           
            </template>
          </v-data-table>
            </v-card>
        </v-row>
    </div>
  </AppLayout>
</template>

<script>
import axios from 'axios';
export default {
    data: () => {
        return {
            listProposalPJ : [],
            itemsPerPage: 10,
            loading: true,
            search: '',
            headers: [
                {
                title: "Código",
                align: "start",
                sortable: true,
                key: "legal_id",
                },
                { title: "Nome", align: "end", key: "legal_location_name_corporation"},
                { title: "Atend.", align: "end", key: "legal_id_user" },
                { title: "CNPJ", align: "end", key: "legal_location_cnpj" },
                { title: "E-mail", align: "end", key: "legal_location_email" },
                { title: "Garantia", align: "end", key: "legal_location_type_guarantee" },
                { title: "Ação", key: "actions", sortable: false },
            ],
            api_ea : import.meta.env.VITE_ESPINDOLA_EA,
            api_escolhaazul : import.meta.env.VITE_API_ESPINDOLA_EA,
            countFilesImages: 0
        }
    },
    methods: {
        eyeProposal(item) {
            window.open(this.api_ea + "?action=view-legal&id=" + btoa(item.legal_id), '_blank');
        },
        analysisProposal(item) {            
            window.open(this.api_ea + "view/report/proposal_pj_adm.php?id=" + btoa(item.legal_id), '_blank');
        },
        imageProposal(item)
        {
           window.open(route('imagem.tipo.profile', [item.legal_id, 'pj' , 'inquilino']), '_blank')
        },
       
    },
    mounted() {
        axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
        axios.get(this.api_escolhaazul + '/api/proposal/pj')
        .then((res) => {
            console.log(res.data)
            this.listProposalPJ = res.data
            this.loading = false;
        })
        .catch((err) => {
            console.log(err)
        })
    },
    computed: {
       
    }
}
</script>

<style>

</style>