<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import SideBar from "@/Components/SideBar/SideBar.vue";
import AppBar from "@/Components/NavBar/AppBar.vue";

import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
  router.put(
    route("current-team.update"),
    {
      team_id: team.id,
    },
    {
      preserveState: false,
    }
  );
};

const logout = () => {
  router.post(route("logout"));
};
</script>

<template>
  <div class="">
    <Head :title="title" />

    <Banner />
    <div class="min-h-screen">
      <v-app id="inspire">
       <!-- MENU LATERAL ESQUERDO -->
        <SideBar />
        <v-main class="bg-slate-100 dark:bg-gray-900">
          <v-container class="py-8 px-6" fluid>
            <!-- BARRA DO TOPO COM ITENS -->
           <AppBar :team="$page.props.auth.user" />
            <v-row>
              <v-col>
                <slot />
              </v-col>
            </v-row>
          </v-container>
        </v-main>
      </v-app>
    </div>
  </div>
</template>

<script>
export default {
  
  data: () => ({
    
    group: null,
    items: [
      {
        title: "Foo",
        value: "foo",
      },
      {
        title: "Bar",
        value: "bar",
      },
      {
        title: "Fizz",
        value: "fizz",
      },
      {
        title: "Buzz",
        value: "buzz",
      },
    ],
    cards: ["Today", "Yesterday"],
    links: [
      ["mdi-inbox-arrow-down", "  "],
      ["mdi-send", "Lucas"],
      ["mdi-delete", "Trash"],
      ["mdi-alert-octagon", "Spam"],
    ],
    
   
  }),

 
};
</script>

<style>
</style>
