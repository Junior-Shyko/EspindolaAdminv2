<script setup>
import { Link } from '@inertiajs/vue3';
import api from "@/Components/server/api"

</script>
<template>
  <div>
    <v-card>
      <v-card-item>
        <v-divider></v-divider>
        <v-container class="">
          <form @submit="onSubmit">
            <v-row no-gutters>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field
                  label="CEP"
                  v-model="contact.cep"
                  variant="filled"
                  @blur="consultaCpf"
                  v-mask="'00000-000'"
                  class="mr-2"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field
                  v-model="contact.address"
                  label="Logradouro"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field
                  v-model="contact.number"
                  class="mr-2"
                  type="number"
                  label="Número"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field
                  v-model="contact.complements"
                  label="Complemento"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field
                  v-model="contact.district"
                  class="mr-2"
                  label="Bairro"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field
                  v-model="contact.city"
                  label="Cidade"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field
                  v-model="contact.state"
                  class="mr-2"
                  label="Estado"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="9">
                <v-text-field
                  v-model="contact.email"
                  label="E-mail"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field
                  v-model="contact.creci"
                  class="mr-2"
                  label="CRECI/CE"
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="9">
                <v-text-field
                  v-model="contact.cnpj"
                  label="CNPJ"
                  v-mask-cnpj
                  variant="filled"
                ></v-text-field>
              </v-col>
              <v-row>

                <v-col cols="6" xs="6" sm="6" md="6">
                  <div class="flex justify-start">
                    <v-btn 
                      title="Voltar para lista"  
                      color="secound" variant="elevated"
                      class="border-current"
                      border="1"
                    >
                      <Link :href="route('contato-site')">
                        <v-icon icon="fa fa-arrow-left"></v-icon>
                          Voltar
                      </Link>                     
                    </v-btn>
                  </div>
                </v-col>

                <v-col cols="6" xs="6" sm="6" md="6">
                  <div class="flex justify-end">
                    <v-btn 
                      title="Alterar os dados existente"
                      color="primary" type="submit" variant="flat">
                      {{ textBtnData }}
                      <v-icon icon="fa fa-floppy-disk" size="sm" class="ml-2"></v-icon>
                    </v-btn>
                  </div>
                </v-col>

              </v-row>
            </v-row>
          </form>
          <v-row>
            <v-col>
              <span class="font-bold">Números de contato: </span>
              <v-btn color="primary" @click="dialog = true" variant="text">
                Adicionar
              </v-btn>
              <v-list lines="one">
                <v-list-item title="(85) 99999-8765" subtitle="Fone Fixo">
                </v-list-item>
                <v-list-item
                  title="(85) 99999-8765"
                  subtitle="Fone Celular e Whatsapp"
                >
                </v-list-item>
              </v-list>
            </v-col>
          </v-row>
        </v-container>
      </v-card-item>
    </v-card>
   
  </div>
</template>

<script>
export default {
  props: {
    dialog: {
      type: Boolean,
    },
    typeForm: String,
    contactData: String,
  },
  data: () => {
    return {
      dialogChildren: true,
      contact: [],
      textBtnData: 'Alterar'
    };
  },
  created() {
    this.getContactApi();
    //  console.log($page)
  },
  methods: {
    consultaCpf() {
      axios
        .get(`${"https://viacep.com.br/ws/" + this.contact.cep + "/json/"}`)
        .then((res) => {
          console.log(res);
          this.contact.address = res.data.logradouro;
          this.contact.district = res.data.bairro;
          this.contact.city = res.data.localidade;
          this.contact.state = res.data.uf;
        })
        .catch((err) => {
          console.log({ err });
        });
    },
    onSubmit(e) {
      e.preventDefault();
      console.log(e.target);
      console.log(this.contact);
      var dataPost = {
        cep: this.contact.cep,
        address: this.contact.address,
        number: this.contact.number,
        complements: this.contact.complements,
        district: this.contact.district,
        city: this.contact.city,
        state: this.contact.state,
        email: this.contact.email,
        creci: this.contact.creci,
        cnpj: this.contact.cnpj,
      };
      if (this.typeForm == "edicao") {      
        this.updateContactApi(dataPost)
      }else{
        this.saveContactApi(dataPost)
      }

    },
    getContactApi() {
      if (this.typeForm == "edicao") {
        this.contact.cep = this.contactData.cep;
        this.contact.address = this.contactData.address;
        this.contact.number = this.contactData.number;
        this.contact.complements = this.contactData.complements;
        this.contact.district = this.contactData.district;
        this.contact.city = this.contactData.city;
        this.contact.state = this.contactData.state;
        this.contact.email = this.contactData.email;
        this.contact.creci = this.contactData.creci;
        this.contact.cnpj = this.contactData.cnpj;
      }
    },
    saveContactApi(dataPost) {
      axios
        .post("http://localhost:8000/salvar-contato", dataPost)
        .then((res) => {
          console.log({ res });
          this.dialogChildren = false;
          this.$emit("update:dialog", this.dialogChildren);
          this.$swal("Cadastro realizado com sucesso");
        })
        .catch((err) => {
          console.log({ err });
        });
    },
    updateContactApi(dataPost) {
      api.patch('editar-contato/' + this.contactData.id, dataPost)
      .then((res) => {
        console.log(res)
        this.$swal("Cadastro alterado com sucesso");
      })
      .catch((err) => {
        console.log(err)
      })
    },
   
  },
};
</script>

<style>
</style>