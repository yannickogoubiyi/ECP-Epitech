<template>
  <div class="container-fluid">
    <!-- titre -->
    <div class="row">
      <div class="col-8 text-center row1">
        <div class="display-3 titre">Les plus belles villes du Bénin</div>
      </div>
    </div>
    <!-- carte de chaque destination -->
    <div class="row">
      <!-- v-for -->
      <div class="card col-5 pl-0 pr-0" v-for="destination in destinations" v-bind:key="destination.id">
        <!-- icone de la destination -->
        <div class="d-flex row mb-3" v-for="destination_image in filteredDestinationImages" v-bind:key="destination_image.id">
          <img :src=destination_image.pics class="rounded-circle mt-4 ml-5" height="50px" width="50px">
          <!-- nom de la destination -->
          <div class="align-self-center">
            <h4 class="w-100 h-20 font-weight-bold mb-2 mt-4 ml-5 h2">{{destination.dest_name}}</h4>
          </div>
        </div>
          <!-- image de la destination -->
          <div class="col-12 pl-0 pr-0" v-for="destination_image in filteredDestinationImages" v-bind:key="destination_image.id">
            <img class=destpic :src=destination_image.pics>
          <div>
            <!-- description -->
            <p class="col-11 ml-auto mr-auto mt-3">{{ destination.dest_description }}
            <!-- router link -->
            <router-link :to="{ name: 'DestinationDetail', params: {id: destination.id }  }" class="btn btn-flat red-text p-1 my-1 mb-3 mml-1"><br>EN SAVOIR PLUS >></router-link></p>
            <!-- <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
            <i class="fas fa-heart text-muted float-right p-1 my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Destination",
  data() {
    return {
      destinations: [],
    };
  },
  methods: {
    // axios de la liste des destinations
    destinationList () {
      axios.get('http://localhost:8000/api/destinations').then(response => this.destinations = response.data.data).catch(error => console.log(error))
        console.log(this.destinations)
        },
    // fonction pour réduire la taille de la description (non implémenté)
    slicedDestinationDescription() {
        for (let destination of this.destinations)
          return destination.dest_description.substring(0, 50)
        },
  },
  computed: {
    // filtre de la première image des destinations
    filteredDestinationImages() {
        for (let destination of this.destinations)
          return destination.destination_images.slice(0, 1);
        },
  },
  mounted() {
    this.destinationList();
  },
};
</script>

<style scoped>
.row1{
  margin-left: auto;
  margin-right: auto;
}
.card{
  margin-top: 2%;
  margin-bottom: 2%;
  margin-right: auto;
  margin-left: auto;
  margin-bottom: 4%;
  color: black;
}
.card:hover{
  text-decoration: none;
  box-shadow: 2px 2px 4px #F4C430;

}
.red-text{
  float: right;
}
.red-text:hover{
  color: black;
  text-shadow: 1px 1px 3px #F4C430;
}
.collapse-content .fa.fa-heart:hover {
  color: #f44336 !important;
}
.collapse-content .fa.fa-share-alt:hover {
  color: #0d47a1 !important;
}
.collapse:not(.show) {
    display: inherit;
}
.titre{
  color: black;
  margin-bottom: 2%;
  margin-top: 2%;
  border: solid 3px black;
  text-shadow: 1px 1px 3px #F4C430;
  box-shadow: 2px 2px 4px #F4C430;
}
img.destpic{
  width: 100%;
  height: 400px;
}
</style>
