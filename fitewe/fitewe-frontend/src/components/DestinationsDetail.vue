<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <div class="display-3 titre">{{ details.dest_name }}</div>
      </div>
    </div>

    <div class="row">
      <div class="col-10 carte" v-for="place in details.places" v-bind:key="place.id">
        <div class="row">
          <div class="text-center col-3" v-for="place_image in place.place_images" v-bind:key="place_image.id">
            <img class="placePic" :src=place_image.pics><br>
          </div>
          <div class="col-6 desc">
            <div class="text-center font-weight-bold display-4">{{ place.place_name }}</div>
            <div class="text-center font-italic">{{ place.place_description }}</div>
            <div class="text-center">Adresse: {{ place.place_address }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-10 carte" v-for="hotel in hotels" v-bind:key="hotel.id">
        <div class="row">
          <div class="text-center col-3" v-for="place_image in place.place_images" v-bind:key="place_image.id">
            <img class="placePic" :src=place_image.pics><br>
          </div>
          <div class="col-6 desc">
            <div class="text-center font-weight-bold display-4">{{ place.place_name }}</div>
            <div class="text-center font-italic">{{ place.place_description }}</div>
            <div class="text-center">Adresse: {{ place.place_address }}</div>
          </div>
        </div>
      </div>
    </div> -->



  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'DestinationDetail',
  data () {
    return {
      details: [],
      hotels: [],
      restaurants: [],
      sites: [],
      divertissements: [],
    }
  },
  methods: {
    getDestinationDetail () {
      let url = 'http://localhost:8000/api/destinations/' + this.$route.params.id
      axios.get(url).then(response => this.details = response.data[0]).catch(error => console.log(error))
        },

    getHotels () {
      let url = 'http://localhost:8000/api/places/type/1'
      axios.get(url).then(response => this.hotels = response.data[0]).catch(error => console.log(error))
        },
    
    getRestaurants () {
      let url = 'http://localhost:8000/api/places/type/2'
      axios.get(url).then(response => this.restaurants = response.data[0]).catch(error => console.log(error))
        },

    getSitesTouristiques () {
      let url = 'http://localhost:8000/api/places/type/3'
      axios.get(url).then(response => this.sites = response.data[0]).catch(error => console.log(error))
        },

    getDivertissements () {
      let url = 'http://localhost:8000/api/places/type/4'
      axios.get(url).then(response => this.divertissements = response.data[0]).catch(error => console.log(error))
        },
  },
  mounted () {
    this.getDestinationDetail(),
    this.getHotels(),
    this.getRestaurants(),
    this.getSitesTouristiques(),
    this.getDivertissements()
  }
}

</script>

<style scoped>
.carte{
  display: inline-block;
  margin-left:8.25%;
  margin-right:8.25%;
  margin-top: 2% ;
  margin-bottom: 2%;
  border: solid 3px #F4C430;
  padding-top: 1%;
  padding-bottom: 1%;
  background-color: white;
  color: rgba(0, 0, 0, 0.7);
}
.carte:hover{
  background-color: #f3e7d4;
}
.titre{
  color: #F4C430;
  margin-bottom: 2%;
  margin-top: 2%;
}
.placePic{
  width: 100%;
  height: auto;
  padding: 0;
}
</style>
