<script setup>
import { Link, router } from "@inertiajs/vue3";
import {adminsMenu} from "@/Components/SideBar/Menu.vue"
const logout = () => {
  console.log("logout");
  router.post(route("logout"));
};
const props = defineProps({
  menu: adminsMenu
})

</script>
<template>
  <div>
    <v-app-bar color="grey-lighten-5">
      <!-- <template v-slot:image>
        <v-img
          gradient="to top right, rgba(19,84,122,.8), rgba(128,208,199,.8)"
        ></v-img>
      </template> -->

      <template v-slot:prepend>
        <v-app-bar-nav-icon
          variant="text"
          @click.stop="drawer = !drawer"
        ></v-app-bar-nav-icon>
      </template>

      <v-app-bar-title>
        <Link :href="route('dashboard')"> Espindola Admin </Link>
      </v-app-bar-title>

      <v-spacer></v-spacer>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
          <div class="hidden sm:flex sm:items-center sm:ml-6">
            <div class="ml-3 relative">
              <v-btn>
                <Link :href="route('profile.show')">
                  <v-icon icon="fas fa-users"></v-icon>
                </Link>
              </v-btn>
              <v-btn>
                <Link :href="route('profile.show')">
                  <v-icon icon="far fa-bell"></v-icon>
                </Link>
              </v-btn>
              <v-btn>
                <Link :href="route('profile.show')">
                  <v-icon icon="far fa-circle-user"></v-icon>
                </Link>
              </v-btn>
              <v-menu :location="location">
                <template v-slot:activator="{ props }">
                  <v-btn dark v-bind="props">
                    <v-icon icon="far fa-circle-user"></v-icon>
                  </v-btn>
                </template>

                <v-list>
                  <v-list-item v-for="(item, index) in items" :key="index">
                    <v-list-item-title>
                      <Link :href="route(item.link)">
                        {{ item.title }}
                      </Link>
                    </v-list-item-title>
                  </v-list-item>
                  <div class="border-t border-gray-200 dark:border-gray-600" />
                  <v-list-item>
                    <v-list-item-title>
                      <form @submit.prevent="logout">
                        <v-btn>
                          Sair <v-icon icon="fas fa-users"></v-icon>
                        </v-btn>
                      </form>
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
            </div>
          </div>
        </div>
      </div>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" location="left" temporary>
      <v-list>
        <v-list-item>
        </v-list-item>
        <v-list-item v-for="(item, index) in adminsMenu" :key="index">
          <template v-slot:prepend>
            <v-icon icon='fa:fas fa-lock' size="sm"></v-icon>
          </template>
          <v-list-item-title>
            <Link :href="route(item.link)">
              {{ item.title }}
            </Link>
          </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  props: {
    team: Object,
  },
  data: () => ({
    drawer: false,
    location: "left",
    idTeam: Number,
    group: null,
    items: [
      { title: "Perfil", link: "profile.show" },
      { title: "Gerenciar Conta", link: "profile.show" },
      { title: "Criar Time", link: "profile.show" },
      { title: "Conf. Time", link: "profile.show" },
    ],
    menu: Array
  }),
  created() {
    this.idTeam = this.team;
    console.log(this.idTeam);
    console.log(typeof this.adminsMenu)
  },
  watch: {
    group() {
      this.drawer = false;
    },
  },
};
</script>

<style>
</style>