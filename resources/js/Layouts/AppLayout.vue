<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
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
        <v-navigation-drawer v-model="drawer">
          <!-- <v-sheet color="grey-lighten-4" class="pa-4">
            <v-avatar class="mb-4" color="grey-darken-1" size="64"></v-avatar>

            <div>john@google.com</div>
          </v-sheet> -->
          <v-card class="mx-auto" color="grey-lighten-4">
            <v-avatar
              class="mb-4"
              color="grey-darken-1"
              size="64"
              style="margin-left: 100px; margin-top: 10px"
            >
            </v-avatar>
            <v-card-title class="flex-just-center">
              {{ $page.props.auth.user.name }}
            </v-card-title>
          </v-card>
          <v-divider></v-divider>

          <v-list v-model:opened="open">
            <v-list-item prepend-icon="fas fa-home" title="Home"></v-list-item>

            <v-list-group value="Users">
              <template v-slot:activator="{ props }">
                <v-list-item
                  v-bind="props"
                  prepend-icon="fas fa-circle-user"
                  title="Usuarios"
                  style="font-style: 10px"
                ></v-list-item>
              </template>

              <v-list-group value="Admin">
                <template v-slot:activator="{ props }">
                  <v-list-item
                    v-bind="props"
                    prepend-icon="fas fa-table-columns"
                    title="Admin"
                    style="font-style: 10px"
                  ></v-list-item>
                </template>

                <v-list-item
                  v-for="([title, icon], i) in admins"
                  :key="i"
                  :title="title"
                  :prepend-icon="icon"
                  :value="title"
                ></v-list-item>
              </v-list-group>

              <v-list-group value="Actions">
                <template v-slot:activator="{ props }">
                  <v-list-item v-bind="props" title="Imóveis"></v-list-item>
                </template>

                <v-list-item
                  v-for="([title, icon], i) in cruds"
                  :key="i"
                  :value="title"
                  :title="title"
                  :prepend-icon="icon"
                ></v-list-item>
              </v-list-group>
            </v-list-group>
          </v-list>
        </v-navigation-drawer>

        <v-main class="bg-slate-100 dark:bg-gray-900">
          <v-container class="py-8 px-6" fluid>
            <v-app-bar
              color="teal-darken-4"
              image="https://picsum.photos/1920/1080?random"
            >
              <template v-slot:image>
                <v-img
                  gradient="to top right, rgba(19,84,122,.8), rgba(128,208,199,.8)"
                ></v-img>
              </template>

              <template v-slot:prepend>
                <v-app-bar-nav-icon></v-app-bar-nav-icon>
              </template>

              <v-app-bar-title>
                <Link :href="route('dashboard')"> Espindola Admin </Link>
              </v-app-bar-title>

              <v-spacer></v-spacer>

              <v-btn icon="far fa-bell"></v-btn>
              <v-btn>
                <Link :href="route('profile.show')">
                  <v-icon icon="far fa-circle-user"></v-icon>
                </Link>
              </v-btn>
            </v-app-bar>

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
    drawer: null,
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
    open: ["Users"],
    admins: [
      ["Gerenciar", "fas fa-user-pen"],
      ["Config", "fas fa-gear"],
    ],
    cruds: [
      ["Imóveis", "fas fa-home"],
      ["Add Imoveis", "fas fa-plus"],
      ["Chave", "fas fa-key"],
      ["Vistoria", "fas fa-pen-to-square"],
    ],
  }),

  watch: {
    group() {
      this.drawer = false;
    },
  },
};
</script>

<style>
.flex-grow {
  flex-grow: 1;
}
.area-desktop {
  margin-left: 200px;
}
.area-desktop-xs {
  margin-left: 0px;
}
.flex-just-center {
  display: flex;
  justify-content: center;
}
.v-list-item--density-default.v-list-item--one-line {
  min-height: 5px !important;
}
</style>
