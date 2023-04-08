<script setup>
 
</script>
<template>
  <div>
    <v-card>
      <v-card-item>
        <v-divider></v-divider>
        <v-container class="">
          <v-row no-gutters>
            <v-col cols="12" xs="12" sm="12" md="6">
              <v-text-field
                label="CEP"
                v-model="contact.cep"
                variant="solo"
                @blur="consultaCpf"
                v-mask="'00000-000'"         
              ></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="6">
              <v-text-field 
                v-model="contact.lograd" 
                label="Logradouro" 
                variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="6">
              <v-text-field v-model="contact.number" label="Numero" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="6">
              <v-text-field v-model="contact.comp" label="Complemento" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="6">
              <v-text-field v-model="contact.district" label="Bairro" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="6">
              <v-text-field v-model="contact.city" label="Cidade" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="3">
              <v-text-field v-model="contact.state" label="Estado" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="9">
              <v-text-field v-model="contact.email" label="E-mail" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="3">
              <v-text-field v-model="contact.creci" label="CRECI/CE" variant="solo"></v-text-field>
            </v-col>
            <v-col cols="12" xs="12" sm="12" md="9">
              <v-text-field v-model="contact.cnpj" label="CNPJ"  v-mask-cnpj variant="solo"></v-text-field>
            </v-col>
            <v-row class="flex justify-end">
              <v-btn color="primary" variant="flat">
                Salvar
                <v-icon icon="fa fa-floppy-disk"></v-icon>
              </v-btn>
            </v-row>
          </v-row>
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

    data: () => {
        return {
            contact : []
        }
    },
    methods: {
        consultaCpf() {
            axios.get(`${'https://viacep.com.br/ws/'+this.contact.cep+'/json/'}`)
            .then((res) => {
                console.log(res)
                this.contact.lograd = res.data.logradouro
                this.contact.district = res.data.bairro
                this.contact.city = res.data.localidade
                this.contact.state = res.data.uf
            })
            .catch((err) => {
                console.log({err})
            })
        }
    }
};
</script>

<style>
</style>