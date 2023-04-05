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
  <div>
    <Head :title="title" />

    <Banner />
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      <v-app id="inspire">
       
        <v-navigation-drawer v-model="drawer">
          <v-sheet color="grey-lighten-4" class="pa-4">
            <v-avatar class="mb-4" color="grey-darken-1" size="64"></v-avatar>

            <div>john@google.com</div>
          </v-sheet>

          <v-divider></v-divider>

          <v-list>
            <v-list-item v-for="[icon, text] in links" :key="icon" link>
              <template v-slot:prepend>
                <v-icon>{{ icon }}</v-icon>
              </template>

              <v-list-item-title>{{ text }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>

        <v-main>
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
              <Link :href="route('dashboard')">
                Espindola Admin
              </Link>
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
              <v-col v-for="card in cards" :key="card" cols="12">
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
    cards: ['Today', 'Yesterday'],
    links: [
        ['mdi-inbox-arrow-down', '  '],
        ['mdi-send', 'Send'],
        ['mdi-delete', 'Trash'],
        ['mdi-alert-octagon', 'Spam'],
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
</style>
