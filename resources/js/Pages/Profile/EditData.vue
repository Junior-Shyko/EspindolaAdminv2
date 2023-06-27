<script setup>
//v-onBlur:update:modelValue="UpdateUser('name', props.user.nameUser)"
import api from "@/Components/server/api"
import { useForm } from 'vee-validate';
// import MyInputComponent from '@/components/MyInputComponent.vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import DataAccess from "./Partials/DataAccess.vue";
import DataCompany from "./Partials/DataCompany.vue";
const props = defineProps({
  user: Object,
});

const { handleSubmit } = useForm();

const onSubmit = handleSubmit(values => {
  // Submit to API
  console.log(values); // { email: 'email@gmail.com' }
});

</script>

<template>
  <AppLayout>
    <Head title="Editar dados de perfil" />
    <v-row align="start" no-gutters>
      <v-col cols="12" xs="12" sm="12" md="3">
        <v-sheet class="pa-2 ma-2">
          <DataAccess :user="props.user" />
        </v-sheet>

        <v-sheet class="pa-2 ma-2">
          <DataCompany />
        </v-sheet>
      </v-col>

      <v-col cols="12" xs="12" sm="12" md="9">
        <v-sheet class="pa-2 ma-2">
          <div class="inline-flex">
            <h1 class="text-2xl p-2">Editar dados</h1>
          </div>
          <v-divider :thickness="4" inset></v-divider>
          <div class="w-full px-3">
            <v-row>
              <v-form @submit.prevent="submit">
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel for="name" value="Nome Completo" />
                <TextInput
                  id="name"
                  v-model="props.user.nameUser"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  name="name"
                  autocomplete="name"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel for="nick" value="Apelido/Nick" />
                <TextInput
                  id="nick"
                  v-model="props.user.nick"
                  placeholder="Como você gosta de ser chamado"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                  :rules="rules"
                  autofocus
                  name="nick"
                  autocomplete="address"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="3">
                <InputLabel for="cep" value="C.E.P" />
                <TextInput
                  id="cep"
                  v-model="props.user.cep"
                  placeholder="Digite seu cep e aguarde"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="address"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="9">
                <InputLabel for="address" value="Logradouro" />
                <TextInput
                  id="address"
                  v-model="props.user.address"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="address"
                />
              </v-col>

              <v-col cols="12" xs="12" sm="12" md="3">
                <InputLabel for="number" value="Número" />
                <TextInput
                  id="number"
                  v-model="props.user.number"
                  placeholder="Digite o número"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="number"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="9">
                <InputLabel for="complement" value="Complemento" />
                <TextInput
                  id="complement"
                  v-model="props.user.complement"
                  placeholder="Complemento, se tiver..."
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="complement"
                />
              </v-col>

              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Bairro" />
                <TextInput
                  id="district"
                  v-model="props.user.district"
                  placeholder="Digite seu bairro"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="district"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Cidade" />
                <TextInput
                  id="city"
                  v-model="props.user.city"
                  placeholder="Digite seu cidade"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="city"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Estado" />
                <TextInput
                  id="state"
                  v-model="props.user.district"
                  placeholder="Digite seu estado"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="state"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Recebe proposta" />
                <v-radio-group v-model="radios" inline>
                  <v-radio
                    label="Sim"
                    color="blue-darken-3"
                    value="true"
                  ></v-radio>
                  <v-radio
                    label="Não"
                    color="blue-darken-3"
                    value="false"
                    aria-checked="true"
                  ></v-radio>
                </v-radio-group>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <div class="inline-flex">
                  <h1 class="text-2xl p-2">Dados pessoais</h1>
                </div>
              </v-col>

              <v-divider :thickness="4" inset></v-divider>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Renda Familiar" />
                <TextInput
                  id="rental_finance"
                  v-model="props.user.rental_finance"
                  placeholder="Qual a sua renda?"
                  type="text"
                  class="border-gray-300 rounded-md shadow-sm mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="rental_finance"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Estado Civil" />
                <select
                  name=""
                  id=""
                  v-model="props.user.marital_status"
                  class="mt-1 block w-full border border-[#1E88E5] rounded-md"
                >
                  <option value="">Casado</option>
                  <option value="">Solteiro</option>
                  <option value="">Divorciado</option>
                  <option value="">OUtros</option>
                </select>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Nacionalidade" />
                <TextInput
                  id="nationality"
                  v-model="props.user.nationality"
                  placeholder="Qual a sua Nacionalidade?"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="nationality"
                />
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Naturalidade" />
                <TextInput
                  id="naturalness"
                  v-model="props.user.naturalness"
                  placeholder="Natural de ?"
                  type="text"
                  class="mt-1 block w-full border border-[#1E88E5]"
                
                  autofocus
                  autocomplete="naturalness"
                />
              </v-col>

              <v-col cols="12">
                <div class="m-4">
                  <v-sheet>
                    <v-btn color="secondary"  type="submit"> Atualizar </v-btn>
                  </v-sheet>
                </div>
              </v-col>
            </v-form>
            </v-row>
          </div>
        </v-sheet>
      </v-col>
    </v-row>
  </AppLayout>
</template>

<script>
export default {
  data: () => {
    return {
      address: "Rua Campo Maior",
      radios: false,
      rules: [
        value => {
          if (value) return true

          return 'You must enter a first name.'
        },
      ],
    };
  },
  methods: {
    UpdateUser(field, value)
    {
      console.log(this.user.id)
      const dataPut = {field : value};
      api.put('update/profile/' + this.user.id, dataPut)
      .then(res => {
        console.log(res)
      })
      .catch()
    },
    async submit (event) {
      console.log({event})
    }
  },
  created() {
    console.log(this.user.receive_proposal);
    this.radios = this.user.receive_proposal;
  },
};
</script>

<style>
</style>