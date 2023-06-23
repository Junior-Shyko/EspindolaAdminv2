<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import EaIconBadge from "@/Components/Espindola/EscolhaAzul/ea-icon-badge.vue";
import { Head } from "@inertiajs/vue3";
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
              <v-progress-circular
                color="primary"
                indeterminate
              ></v-progress-circular>
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
            <template v-slot:item.legal_status="{ item }">
              <small 
                v-if="item.raw.legal_status !== ''"
                class="bg-emerald-600 p-1 rounded-md text-gray-50">
                {{ item.raw.legal_status }}
              </small>
              <small v-else class="bg-neutral-100 p-1 rounded-md text-zinc-950">
                Incompleta
              </small>            
            </template>
            <template v-slot:item.legal_location_type_guarantee="{ item }">
              <small v-if="item.raw.legal_location_type_guarantee !== null">
                {{ item.raw.legal_location_type_guarantee }}
              </small>
              <small v-else class="bg-blue-grey-darken-2 p-1 rounded-md text-gray-50">
                Não informado
              </small>
            </template>
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
            <v-dialog
                transition="dialog-bottom-transition"
                v-model="dialog"
                max-width="400px"
              >
                <v-card>
                  <v-toolbar
                    color="primary"
                    title="Alterar Atendente da proposta nº 1604"
                  ></v-toolbar>
                  <v-card-text>
                    <p>
                      <label for="">Escolha outro atendente</label>
                    </p>
                    <p>
                      <select name="" id="" class="bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                      </select>
                    </p>
                  </v-card-text>
                  <v-card-actions>
                    <v-btn color="primary" block @click="dialog = false"
                      >Fechar</v-btn
                    >
                  </v-card-actions>
                </v-card>
              </v-dialog>
        </v-card>
      </v-row>
    </div>
  </AppLayout>
</template>

<script>
import axios from "axios";
export default {
  data: () => {
    return {
      listProposalPJ: [],
      itemsPerPage: 10,
      loading: true,
      search: "",
      headers: [
        {
          title: "Código",
          align: "start",
          sortable: true,
          key: "legal_id",
          width: 50,
        },
        {
          title: "Nome",
          align: "start",
          key: "legal_location_name_corporation",
          width: 280,
        },
        { title: "Status.", align: "end", key: "legal_status", width: 150 },
        { title: "CNPJ", align: "end", key: "legal_location_cnpj", width: 180 },
        {
          title: "E-mail",
          align: "end",
          key: "legal_location_email",
          width: 180,
        },
        {
          title: "Garantia",
          align: "end",
          key: "legal_location_type_guarantee",
          width: 130,
        },
        { title: "Ação", key: "actions", sortable: false, width: 180 },
      ],
      api_ea: import.meta.env.VITE_ESPINDOLA_EA,
      api_escolhaazul: import.meta.env.VITE_API_ESPINDOLA_EA,
      countFilesImages: 0,
      dialog: false,
    };
  },
  methods: {
    eyeProposal(item) {
      window.open(
        this.api_ea + "?action=view-legal&id=" + btoa(item.legal_id),
        "_blank"
      );
    },
    analysisProposal(item) {
      window.open(
        this.api_ea +
          "view/report/proposal_pj_adm.php?id=" +
          btoa(item.legal_id),
        "_blank"
      );
    },
    imageProposal(item) {
      window.open(
        route("imagem.tipo.profile", [item.legal_id, "pj", "inquilino"]),
        "_blank"
      );
    },
  },
  mounted() {
    axios.defaults.headers.common["Access-Control-Allow-Origin"] = "*";
    axios
      .get(this.api_escolhaazul + "/api/proposal/pj")
      .then((res) => {
        console.log(res.data);
        this.listProposalPJ = res.data;
        this.loading = false;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  computed: {},
};
</script>

<style>
</style>