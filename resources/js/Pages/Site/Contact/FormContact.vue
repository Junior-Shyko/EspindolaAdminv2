<script setup>
 
</script>
<template>
  <div>
    <v-card>
      <v-card-item>
        <v-divider></v-divider>
        <v-container class="">
          <form @submit="onSubmit">
            <v-row no-gutters>
              <v-col cols="12" xs="12" sm="12" md="6" >
                <v-text-field
                  label="CEP"
                  v-model="contact.cep"
                  variant="solo"
                  @blur="consultaCpf"
                  v-mask="'00000-000'"  
                  class="mr-2"     
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field 
                  v-model="contact.address" 
                  label="Logradouro"               
                  variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field v-model="contact.number" class="mr-2" type="number" label="Número" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field v-model="contact.complements" label="Complemento" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field v-model="contact.district" class="mr-2" label="Bairro" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field v-model="contact.city" label="Cidade" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field v-model="contact.state" class="mr-2"  label="Estado" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="9">
                <v-text-field v-model="contact.email" label="E-mail" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <v-text-field v-model="contact.creci" class="mr-2"  label="CRECI/CE" variant="solo"></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="9">
                <v-text-field v-model="contact.cnpj" label="CNPJ"  v-mask-cnpj variant="solo"></v-text-field>
              </v-col>
              <v-row class="flex justify-end">
                <v-btn color="primary" type="submit" variant="flat">
                  Salvar
                  <v-icon icon="fa fa-floppy-disk"></v-icon>
                </v-btn>
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
    props:{
      dialog: {
        type: Boolean
      }
    },
    data: () => {
        return { 
          dialogChildren: true, 
          contact : []
        }
    },
    methods: {
        consultaCpf() {
            axios.get(`${'https://viacep.com.br/ws/'+this.contact.cep+'/json/'}`)
            .then((res) => {
                console.log(res)
                this.contact.address = res.data.logradouro
                this.contact.district = res.data.bairro
                this.contact.city = res.data.localidade
                this.contact.state = res.data.uf
            })
            .catch((err) => {
                console.log({err})
            })
        },
        onSubmit(e) {
          e.preventDefault()
          console.log(e.target)
          console.log(this.contact)
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
            cnpj: this.contact.cnpj
          }
         
          axios.post('http://localhost:8000/salvar-contato', dataPost )
          .then((res) => {
            console.log({res})
            this.dialogChildren = false;
            this.$emit('update:dialog', this.dialogChildren);
            this.$swal('Cadastro realizado com sucesso');
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