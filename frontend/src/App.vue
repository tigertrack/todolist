<template>
<div id="app">
  <v-app id="inspire">
    <v-app id="inspire">
      <v-navigation-drawer
        v-model="drawer"
        app
      >
        <v-list dense>
          <v-list-item link v-for="(item, index) in sections" :key="index" :to="`/section/`+item.id">
            <v-list-item-action>
              <v-icon>mdi-bookmark</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>{{item.name}}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          
        </v-list>
      </v-navigation-drawer>
  
      
  
      <v-main>
        <router-view></router-view>
      </v-main>
      
    </v-app>
  </v-app>
</div>
</template>

<script>
export default {
  data() {
    return {
      drawer : true,
      sections : []
    }
  },
  mounted() {
    window.axios.get('/sections')
      .then(response => {
        this.sections = response.data
      })
  },
}
</script>
