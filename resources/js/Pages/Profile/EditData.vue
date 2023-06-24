<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
</script>

<template>
  <AppLayout>
    <Head title="Editar dados de perfil" />
    <v-row align="start" no-gutters >
      <v-col cols="12" xs="12" sm="12" md="3">
        <v-sheet class="pa-2 ma-2">
          <div class="inline-flex">
            <h1 class="text-2xl p-2">Dados de acesso</h1>
          </div>
          <v-divider :thickness="4" inset></v-divider>
          <v-list-item
            prepend-avatar="https://cdn.vuetifyjs.com/images/lists/1.jpg"
            :title="`${$page.props.user.name}`"
            height="68"
          >
            <template v-slot:subtitle>
              <span class="font-weight-bold">Time: </span>
              {{ $page.props.user.nameTeam }}
            </template>
          </v-list-item>

        </v-sheet>
      </v-col>

      <v-col cols="12"  xs="12" sm="12" md="9">
        <v-sheet class="pa-2 ma-2">
          <div class="inline-flex">
            <h1 class="text-2xl p-2">Editar dados</h1>
          </div>
          <v-divider :thickness="4" inset></v-divider>
          <div class="w-full px-3">
            <v-row >
              <v-col  cols="12"  xs="12" sm="12" md="6">
                <InputLabel for="name" value="Nome Completo" />
                    <TextInput
                        id="cep"
                        v-model="address"
                        type="text"
                        class="mt-1 block w-full border border-[#1E88E5]"
                        required
                        autofocus
                        autocomplete="name"
                    />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="6">
                <InputLabel for="nick" value="Apelido/Nick" />
                    <TextInput
                        id="cep"
                        placeholder="Como você gosta de ser chamado"
                        type="text"
                        class="mt-1 block w-full border border-[#1E88E5]"
                        required
                        autofocus
                        autocomplete="address"
                    />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="3">
                <InputLabel for="cep" value="C.E.P" />
                <TextInput
                    id="cep"
                    placeholder="Digite seu cep e aguarde"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="address"
                />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="9">
                <InputLabel for="address" value="Logradouro" />
                <TextInput
                    id="cep"
                    v-model="address"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="address"
                />
              </v-col>

              <v-col  cols="12"  xs="12" sm="12" md="3">
                <InputLabel for="number" value="Número" />
                <TextInput
                    id="number"
                    placeholder="Digite o número"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="number"
                />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="9">
                <InputLabel for="complement" value="Complemento" />
                <TextInput
                    id="complement"
                    placeholder="Complemento, se tiver..."
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="complement"
                />
              </v-col>

              <v-col  cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Bairro" />
                <TextInput
                    id="district"
                    placeholder="Digite seu bairro"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="district"
                />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="6">
                <InputLabel value="Estado" />
                <TextInput
                    id="state"
                    placeholder="Digite seu estado"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="state"
                />
              </v-col>
              <div class="inline-flex">
                <h1 class="text-2xl p-2">Dados pessoais</h1>
            </div>
            <v-divider :thickness="4" inset></v-divider>
            <v-col  cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Renda Familiar" />
                <TextInput
                    id="rental_finance"
                    placeholder="Qual a sua renda?"
                    type="text"
                    class="border-gray-300 rounded-md shadow-sm mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="rental_finance"
                />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="6">
                <InputLabel value="Estado Civil" />
                <select name="" id="" class="mt-1 block w-full border border-[#1E88E5] rounded-md " >
                    <option value="">Casado</option>
                    <option value="">Solteiro</option>
                    <option value="">Divorciado</option>
                    <option value="">OUtros</option>
                </select>
              </v-col>
              <v-col  cols="12" xs="12" sm="12" md="6">
                <InputLabel value="Nacionalidade" />
                <TextInput
                    id="nationality"
                    placeholder="Qual a sua Nacionalidade?"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="nationality"
                />
              </v-col>
              <v-col  cols="12"  xs="12" sm="12" md="6">
                <InputLabel value="Naturalidade" />
                <TextInput
                    id="naturalness"
                    placeholder="Natural de ?"
                    type="text"
                    class="mt-1 block w-full border border-[#1E88E5]"
                    required
                    autofocus
                    autocomplete="naturalness"
                />
              </v-col>
              
              <v-col cols="12">
                <div class="m-4">
                    <v-sleet>
                <v-btn color="secondary">
                    Atualizar
                </v-btn>
              </v-sleet>
                </div>
              </v-col>
            </v-row>
          </div>
        </v-sheet>
      </v-col>
    </v-row>
    <div>
      <h1>Editar Dados</h1>
      <!-- <p>{{ $page.props.user }}</p> -->
    </div>
  </AppLayout>
</template>

<script>
export default {
    data:() => {
        return {
            address : 'Rua Campo Maior'
        }
    }
};
</script>

<style>
</style>