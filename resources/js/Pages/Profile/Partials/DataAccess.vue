<script setup>
import moment from "moment";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
const props = defineProps({
  user: Object,
});
</script>


<template>
  <div>
    <div class="inline-flex">
      <h1 class="text-2xl p-2">Dados de acesso</h1>
    </div>
    <v-divider :thickness="4" inset></v-divider>
    <v-list-item
      prepend-avatar="https://cdn.vuetifyjs.com/images/lists/1.jpg"
      :title="props.user.nameUser"
      height="68"
    >
      <template v-slot:subtitle>
        <p class="text-base">
          <span class="font-weight-bold text-[#0284c7]">Time: </span>
          {{ props.user.nameTeam }}
        </p>
        <p class="text-base">
          <span class="font-weight-bold text-[#0284c7]">Criado em: </span>
          {{ moment(props.user.created_at).format("DD/MM/YYYY") }}
        </p>
      </template>
    </v-list-item>

    <v-divider :thickness="4" inset></v-divider>

    <v-col cols="12">
      <InputLabel value="E-mail" />
      <TextInput
        id="email"
        v-model="props.user.email"
        type="text"
        class="mt-1 block w-full border border-[#1E88E5]"
        required
        autofocus
        autocomplete="email"
      />
    </v-col>
    <v-col cols="12">
      <InputLabel value="Senha" />
      <TextInput
        id="password"
        v-model="props.user.password"
        type="password"
        class="mt-1 block w-full border border-[#1E88E5]"
        required
        autofocus
        autocomplete="password"
      />
    </v-col>
    <div class="">
      <v-btn color="secondary" :block="true"> Alterar </v-btn>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>