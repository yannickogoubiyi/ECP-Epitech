<template>
    <nav class="navbar navbar-expand-lg navbar-custom">
      <a class="navbar-brand" href="#">FITEWE</a>
     
      <form class="form-inline my-2 my-lg-0">
          <div class="flex flex-col justify-items-center">
            <div class="position-absolute z-index-0" @click="modal = false"></div>
            <input class="form-control mr-sm-2 z-index-1" type="text" v-model="name" autocomplete="off" placeholder="Rechercher" @input="filterNames" @focus="modal = true" aria-label="Search">
              <div v-if="filteredNames && modal" class="z-index-1">
                <ul class="list-unstyled searchBoxList">
                  <li v-for="filteredName in filteredNames" class="searchBoxItem z-index-5" v-bind:key="filteredName.id" @click="setName(filteredName)">{{ filteredName }}</li>
                </ul>
              </div>
            </div>
          <router-link :to="{ name: 'DestinationDetail', params: {id: name }  }" class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></router-link>
        </form>

       <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Destinations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">J'y ai été</a>
          </li>

          <li class="nav-item">
              <router-link class="nav-link pr-3" to="/logout">Déconnexion</router-link>
          </li>
        </ul>
        <span class="navbar-text">
            | Bienvenue {{username}}
        </span>
      </div>
    </nav> 
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'Navbar',

  computed: {
    ...mapGetters({ currentUser: 'currentUser' })
   },

  created () {
    this.checkCurrentLogin()
    this.username = localStorage.username
  },

  updated () {
    this.checkCurrentLogin()
  },

  methods: {
    checkCurrentLogin () {
      if (!this.currentUser && this.$route.path !== '/') {
        this.$router.replace(this.$route.query.redirect || '/home')
      }
    },
  }
  
}
</script>

<style scoped>
.navbar-text{
  font-family: Roboto, sans-serif;
  color: white;
}
</style>
    