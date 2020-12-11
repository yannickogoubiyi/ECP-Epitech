<template>
  <div class="vue-template">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <router-link :to="{ name: 'home'}" class="navbar-brand" href="#">FITEWE</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link :to="{name: 'destinations' }" class="nav-link" href="#">Destinations</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">J'y ai été</a>
          </li>
          <li class="nav-item">
            <router-link class="nav-link pr-3" to="/login">Se connecter</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link pr-3" to="/">S'inscrire</router-link>
          </li>
        </ul>

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
      </div>
    </nav>

    <div class="App">
      <div class="container-fluid">
        <router-view />
      </div>
    </div>

    <!-- Footer -->
  <footer class="page-footer font-small teal pt-4">
    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">
          <!-- Content -->
          <h5 class="text-uppercase font-weight-bold">About us</h5>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
            repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
            harum esse fugiat. Itaque, culpa?</p>
        </div>
        <!-- Grid column -->
        <hr class="clearfix w-100 d-md-none pb-3">
        <!-- Grid column -->
        <div class="col-md-6 mb-md-0 mb-3">
          <!-- Content -->
          <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
            commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
            excepturi hic.</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
    <!-- Footer Text -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright
      <a href="#"> CodeTech</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'App',
  data () {
    return {
      requests:[],
      modal: false,
      // places:[],
      name: "",
      names:[],
      filteredNames: [],
      destInfos:[],
    }
  },
  methods: {
    getDestinations() {
      let url = 'http://localhost:8000/api/destinations/'
      axios.get(url).then(response => this.requests = this.addDestNames(response)).catch(error => console.log(error))
    },
        addDestNames(req) {
          if(req) {
            for (let destination of req.data.data)
              this.names.push(destination.dest_name)
            for (let destination of req.data.data)
              this.destInfos.push([destination.id, destination.dest_name])
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
    }
  },
  watch: {
    name () {
      this.filterNames()
    }
  },
  mounted () {
    this.getDestinations()
    // this.getPlaces()
  }
}
</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto');

.navbar-custom {
    background-color: #F4C430;
}

.navbar-custom .navbar-brand{
  color: black;
}

.navbar-custom .nav-link {
    color: black;
}

.navbar-custom .nav-item:hover .nav-link {
  color: white;
}

.page-footer{
  background-color: #F4C430;
}

.footer-copyright{
  background-color: #daae2d;
}

.searchBoxList{
  width: 223px;
  background-color: white;
  color: black;
  border-bottom: solid 1px grey;
  border-right: solid 1px grey;
  border-left: solid 1px grey;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  position: absolute;
  
}

.searchBoxItem{
  padding-top: 10px;
  padding-bottom: 2%;
  padding-left: 3%;
  border-top: solid 1px grey;
  position: relative;
}

</style>
