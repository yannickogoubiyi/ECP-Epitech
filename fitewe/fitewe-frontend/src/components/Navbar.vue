<template>
    <nav class="navbar navbar-expand-lg navbar-custom">
      <a class="navbar-brand" href="#">FITEWE</a>
     
      <form class="form-inline my-3 my-lg-0 flex-fill justify-content-center">
          <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
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
    