<script setup>
</script>

<template>
  <div>
    <v-row no-gutters>
      <v-col cols="12" md="6">
        <v-row no-gutters>
          <v-col v-for="n in 3" :key="n">
            <div class="flex justify-center text-center p-1 mb-2">
              <v-card width="100%">
                <v-icon icon="fas fa-edit" class="mt-5"></v-icon>
                <v-card-item>
                  <div class="text-slate-400 mt-3">Proposta de hoje</div>
                  <div class="text-sky-600 mt-3 text-2xl font-bold">90</div>
                </v-card-item>
              </v-card>
            </div>
          </v-col>
        </v-row>

        <v-row no-gutters>
          <v-card width="100%">
            <div class="flex justify-center text-center p-2">
              <v-list density="compact">
                <v-list-subheader>REPORTS</v-list-subheader>
              </v-list>
              <v-list lines="three">
                <v-list-subheader>User Controls</v-list-subheader>

                <v-list-item>
                  <v-list-item-title>Content filtering</v-list-item-title>

                  <v-list-item-subtitle>
                    Set the content filtering level to restrict appts that can
                    be downloaded
                  </v-list-item-subtitle>
                </v-list-item>

                <v-list-item>
                  <v-list-item-title>Password</v-list-item-title>

                  <v-list-item-subtitle>
                    Require password for purchase or use password to restrict
                    purchase
                  </v-list-item-subtitle>
                </v-list-item>
              </v-list>
            </div>
          </v-card>
        </v-row>
      </v-col>

      <v-col cols="12" md="6">
        <div class="flex justify-center p-1 mb-2">
          <v-card>
            <v-list :items="items" item-props lines="three">
              <template v-slot:subtitle="{ subtitle }">
                <div v-html="subtitle"></div>
              </template>
            </v-list>
          </v-card>
        </div>
      </v-col>
    </v-row>

    <v-row no-gutters>
      <v-col cols="12" md="12">
        <v-card class="mx-auto">
          <v-card-title> Escolha Azul </v-card-title>
          <v-card-subtitle> Dados de todas as propostas </v-card-subtitle>

          <v-card-actions>
            <v-col cols="12" md="3"  v-for="n in 4" :key="n">
              <v-sheet >
                <div class="grid grid-cols-2 gap-1 place-content-center">
                  <v-card-title>
                    <v-icon class="icon-ea" icon="fa fa-chart-line"></v-icon>
                  </v-card-title>
                  <v-card-subtitle>
                    Pessoa Física
                    <v-card-title> 23k </v-card-title>
                  </v-card-subtitle>
                </div>
              </v-sheet >
            </v-col>
           

            <v-spacer></v-spacer>
            <v-row>
              <v-col cols="12" md="4">
                <v-btn
                  :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                  @click="show = !show"
                ></v-btn>
              </v-col>
            </v-row>
          </v-card-actions>

          <v-expand-transition>
            <div v-show="show">
              <v-divider></v-divider>

              <v-card-text>
                I'm a thing. But, like most politicians, he promised more than
                he could deliver. You won't have time for sleeping, soldier, not
                with all the bed making you'll be doing. Then we'll go with that
                data file! Hey, you add a one and two zeros to that or we walk!
                You're going to do his laundry? I've got to find a way to
                escape.
              </v-card-text>
            </div>
          </v-expand-transition>
        </v-card>
      </v-col>

      <v-col cols="4">
        <v-sheet class="pa-2 ma-2"> .v-col-4 </v-sheet>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  data: () => ({
    items: [
      { type: "subheader", title: "Today" },
      {
        prependAvatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        title: "Brunch this weekend?",
        subtitle: `<span class="text-primary">Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?`,
      },
      { type: "divider", inset: true },
      {
        prependAvatar: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
        title: "Summer BBQ",
        subtitle: `<span class="text-primary">to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.`,
      },
      { type: "divider", inset: true },
      {
        prependAvatar: "https://cdn.vuetifyjs.com/images/lists/3.jpg",
        title: "Oui oui",
        subtitle:
          '<span class="text-primary">Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?',
      },
      { type: "divider", inset: true },
      {
        prependAvatar: "https://cdn.vuetifyjs.com/images/lists/4.jpg",
        title: "Birthday gift",
        subtitle:
          '<span class="text-primary">Trevor Hansen</span> &mdash; Have any ideas about what we should get Heidi for her birthday?',
      },
      { type: "divider", inset: true },
      {
        prependAvatar: "https://cdn.vuetifyjs.com/images/lists/5.jpg",
        title: "Recipe to try",
        subtitle:
          '<span class="text-primary">Britta Holt</span> &mdash; We should eat this: Grate, Squash, Corn, and tomatillo Tacos.',
      },
    ],
  }),
};
</script>
<style>
.icon-ea {
  background-color: rgb(106, 27, 154);
  height: 50px;
  width: 50px;
  border-radius: 5px;
  display: flex;
  color: white;
}
</style>