<template>
    <nav class="navbar navbar-expand-lg navbar-custom">
      <router-link type="button" :to="{name: 'home'}" class="navbar-brand">FITEWE</router-link>
     
      <form v-on:submit="redirect" class="form-inline my-2 my-lg-0">
          <div class="flex flex-col justify-items-center">
            <div class="position-absolute z-index-0" @click="modal = false"></div>
            <input class="form-control mr-sm-2 z-index-1" type="text" v-model="name" autocomplete="off" placeholder="Rechercher" @input="filterNames" @focus="modal = true" aria-label="Search">
              <div v-if="filteredNames && modal" class="z-index-1">
                <ul class="list-unstyled searchBoxList">
                  <li v-for="filteredName in filteredNames" class="searchBoxItem z-index-5" v-bind:key="filteredName.id" @click="setName(filteredName)">{{ filteredName }}</li>
                </ul>
              </div>
            </div>
          <router-link :to="{ name: 'DestinationDetail', params: {id: this.$route.query }  }" class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></router-link>
        </form>

       <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link :to="{name: 'destinations'}" class="nav-link" href="#">Destinations</router-link>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">J'y ai été</a> -->
            <router-link class="nav-link pr-3" to="/suggestedPlace">J'y ai été</router-link>
          </li>

          <li class="nav-item">
              <router-link class="nav-link pr-3" to="/logout">Déconnexion</router-link>
          </li>
        </ul>
        <span class="navbar-text">
            | Bienvenue {{username}} 
        </span> 
        <span> <img v-bind:src="avatar" alt="Avatar" class="avatar ml-2"> </span>
      </div>
    </nav> 
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'


export default {
  name: 'Navbar',

  data () {
    return {
      username: localStorage.username,
      avatar: localStorage.userAvatar,

      requests:[],
      modal: false,
      // places:[],
      name: "",
      names:[],
      filteredNames: [],
      destInfos:[],
    }
  },

  computed: {
    ...mapGetters({ currentUser: 'currentUser' })
   },

  created () {
    this.checkCurrentLogin()
    this.getDestinations()
    // this.getPlaces()
    
    
  },

  mounted() {
  },

  updated () {
    this.checkCurrentLogin()
  },

  watch: {
    name () {
      this.filterNames()
    }
  },

  methods: {
    checkCurrentLogin () {
      if (!this.currentUser && this.$route.path !== '/') {
        this.$router.replace(this.$route.query.redirect || '/home')
      }
    },

    getDestinations() {
      let url = 'http://localhost:8000/api/destinations/'
      axios.get(url).then(response => this.requests = this.addDestNames(response)).catch(error => console.log(error))
    },
        addDestNames(req) {
          if(req) {
            for (let destination of req.data.data)
              this.names.push(destination.dest_name)
            for (let destInfo of req.data.data)
              this.destInfos.push([destInfo.id, destInfo.dest_name])
          }
    },
    // getPlaces() {
    //   let url = 'http://localhost:8000/api/places/'
    //   axios.get(url).then(response => this.places = this.addPlaceNames(response)).catch(error => console.log(error))
    // },
    //     addPlaceNames(req) {
    //       if(req) {
    //         for (let place of req.data)
    //           this.names.push(place.place_name.slice(0, -1))
    //           console.log(this.names)
    //     }
    // },
    filterNames() {
      this.filteredNames = this.names.filter(name => {
          return name.toLowerCase().startsWith(this.name.toLowerCase())
        })
    },
    setName(name) {
      this.name = name;
      this.modal = false;
    },
    redirect(name) {

    }
  }
  
}
</script>

<style scoped>
.navbar-text{
  font-family: Roboto, sans-serif;
  color: white;
}

.avatar {
  vertical-align: middle;
  width: 40px;
  height: 40px;
  border-radius: 50%;
}
</style>
    