<template>
  <div class="container-fluid">
    <!-- nom de la destination, titre de la page -->
    <div class="row">
      <div class="col-6 text-center row1">
        <div class="display-3 titre">{{ details.dest_name }}</div>
      </div>
    </div>
    
          <!-- LISTE DES HOTELS -->
          <div class="placetype h1">
            <img class="iconetype" src="../assets/images/icone_hotel.svg" alt="icone_hôtels">
            <u>HOTELS</u></div>
      <!-- V-for -->
      <div class="row">
        <div class="col-5 carte" v-for="hotel in hotels" v-bind:key="hotel.id">
          <!-- Vignette -->
          <div class="row">
            <div class="text-center col-4" v-for="(place_image, index) in hotel.place_images" v-bind:key="place_image.id" :class="{ 'inactive': index != 0 }">
              <img class="placePic" :src=place_image.pics><br>
              <!-- Likes et dislikes -->
              <div class="row">
                  <div class="col-4 pr-0">  <img class="iconlike" src="../assets/images/icone_like.png" alt="like">
                    {{ hotel.likes_count }}</div>
                  <div class="col-4 pl-0">  <img class="icondislike" src="../assets/images/icone_dislike.png" alt="dislike">
                    {{ hotel.dislikes_count }}</div>
                </div>
            </div>
            <!-- Description -->
            <div class="col-8 desc align-items-center">
              <div class="text-center font-weight-bold h2">{{ hotel.place_name }}</div>
              <div class="text-center">{{ hotel.place_address }}</div>
              <div class="text-center font-italic"><br>{{ hotel.place_description }}</div>
              <!-- Router Link -->
              <router-link :to="{ name: 'PlaceDetail', params: {id: hotel.id }  }" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1"><br>EN SAVOIR PLUS >></router-link>
            </div>
          </div>
        </div>
      </div>

          <!-- LISTE DES RESTAURANTS-->
          <div class="placetype h1">
            <img class="iconetype" src="../assets/images/icone_restaurant.svg" alt="icone_restaurants">
            <u>RESTAURANTS</u></div>
      <!-- V-for -->
      <div class="row">
        <div class="col-5 carte" v-for="restaurant in restaurants" v-bind:key="restaurant.id">
          <!-- Vignette -->
          <div class="row">
            <div class="text-center col-4" v-for="(place_image, index) in restaurant.place_images" v-bind:key="place_image.id" :class="{ 'inactive': index != 0 }">
              <img class="placePic" :src=place_image.pics><br>
              <!-- Likes et dislikes -->
              <div class="row">
                  <div class="col-4 pr-0">  <img class="iconlike" src="../assets/images/icone_like.png" alt="like">
                     {{ restaurant.likes_count }}</div>
                  <div class="col-4 pl-0">  <img class="icondislike" src="../assets/images/icone_dislike.png" alt="dislike">
                   {{ restaurant.dislikes_count }}</div>
                </div>
            </div>
            <!-- Description -->
            <div class="col-8 desc align-items-center">
              <div class="text-center font-weight-bold h2">{{ restaurant.place_name }}</div>
              <div class="text-center">{{ restaurant.place_address }}</div>
              <div class="text-center font-italic"><br>{{ restaurant.place_description }}</div>
              <!-- Router Link -->
              <router-link :to="{ name: 'PlaceDetail', params: {id: restaurant.id }  }" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1"><br>EN SAVOIR PLUS >></router-link>
            </div>
          </div>
        </div>
      </div>

          <!-- LISTE DES SITES TOURISTIQUES-->
          <div class="placetype h1">
            <img class="iconetype" src="../assets/images/icone_tourisme.svg" alt="icone_sites_touristiques">
            <u>SITES TOURISTIQUES</u></div>
      <!-- V-for -->
      <div class="row">
        <div class="col-5 carte" v-for="site in sites" v-bind:key="site.id">
          <!-- Vignette -->
          <div class="row">
            <div class="text-center col-4" v-for="(place_image, index) in site.place_images" v-bind:key="place_image.id" :class="{ 'inactive': index != 0 }">
              <img class="placePic" :src=place_image.pics><br>
              <!-- Likes et dislikes -->
              <div class="row">
                  <div class="col-4 pr-0">  <img class="iconlike" src="../assets/images/icone_like.png" alt="like">
                     {{ site.likes_count }}</div>
                  <div class="col-4 pl-0">  <img class="icondislike" src="../assets/images/icone_dislike.png" alt="dislike">
                   {{ site.dislikes_count }}</div>
                </div>
            </div>
            <!-- Description -->
            <div class="col-8 desc align-items-center">
              <div class="text-center font-weight-bold h2">{{ site.place_name }}</div>
              <div class="text-center">{{ site.place_address }}</div>
              <div class="text-center font-italic"><br>{{ site.place_description }}</div>
              <!-- Router Link -->
              <router-link :to="{ name: 'PlaceDetail', params: {id: site.id }  }" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1"><br>EN SAVOIR PLUS >></router-link>
            </div>
          </div>
        </div>
      </div>

          <!-- LISTE DES LIEUX DE DIVERTISSEMENT -->
          <div class="placetype h1">
            <img class="iconetype" src="../assets/images/icone_divertissement.svg" alt="icone_lieux_divertissement">
            <u>DIVERTISSEMENTS ET LOISIRS</u></div>
      <!-- V-for -->
      <div class="row">
        <div class="col-5 carte" v-for="divertissement in divertissements" v-bind:key="divertissement.id">
          <!-- Vignette -->
          <div class="row">
            <div class="text-center col-4" v-for="(place_image, index) in divertissement.place_images" v-bind:key="place_image.id" :class="{ 'inactive': index != 0 }">
              <img :src=place_image.pics class="placePic"><br>
              <!-- Likes et dislikes -->
              <div class="row">
                  <div class="col-4 pr-0">  <img class="iconlike" src="../assets/images/icone_like.png" alt="like">
                     {{ divertissement.likes_count }}</div>
                  <div class="col-4 pl-0">  <img class="icondislike" src="../assets/images/icone_dislike.png" alt="dislike">
                   {{ divertissement.dislikes_count }}</div>
                </div>
            </div>
            <!-- Description -->
            <div class="col-8 desc align-items-center">
              <div class="text-center font-weight-bold h2">{{ divertissement.place_name }}</div>
              <div class="text-center">{{ divertissement.place_address }}</div>
              <div class="text-center font-italic"><br>{{ divertissement.place_description }}</div>
              <!-- Router Link -->
              <router-link :to="{ name: 'PlaceDetail', params: {id: divertissement.id }  }" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 col-12">EN SAVOIR PLUS >></router-link>
            </div>
          </div>
        </div>
      </div>



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
      placeImages: []
    }
  },
  methods: {
    // axios de l'API destinations
    getDestinationDetail () {
      let url = 'http://localhost:8000/api/destinations/' + this.$route.params.id
      axios.get(url).then(response => this.details = response.data[0]).catch(error => console.log(error))
        },

    // axios de l'API hotels/destinations
    getHotels () {
      let url = 'http://localhost:8000/api/places/type/1/destination/' + this.$route.params.id
      axios.get(url).then(response => this.hotels = response.data).catch(error => console.log(error))
        },
    
    // axios de l'API restaurants/destinations
    getRestaurants () {
      let url = 'http://localhost:8000/api/places/type/2/destination/' + this.$route.params.id
      axios.get(url).then(response => this.restaurants = response.data).catch(error => console.log(error))
        },

    // axios de l'API sites touristiques/destinations
    getSitesTouristiques () {
      let url = 'http://localhost:8000/api/places/type/3/destination/' + this.$route.params.id
      axios.get(url).then(response => this.sites = response.data).catch(error => console.log(error))
        },

    // axios de l'API divertissements/destinations
    getDivertissements () {
      let url = 'http://localhost:8000/api/places/type/4/destination/' + this.$route.params.id
      axios.get(url).then(response => this.divertissements = response.data).catch(error => console.log(error))
        },
    
    // axios de l'API placeImages
    getPlaceImages () {
      let url = 'http://localhost:8000/api/placeimagedistinct/'
      axios.get(url).then(response => this.placeImages = response.data).catch(error => console.log(error))
        },
  },
computed: {
    // filtres première image par place
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
.row1{
  margin-left: auto;
  margin-right: auto;
}
.carte{
  display: inline-block;
  margin-top: 2% ;
  margin-bottom: 2%;
  margin-left: auto;
  margin-right: auto;
  border: solid 1px rgb(167, 167, 167);
  border-radius: 15px;
  padding-top: 1%;
  padding-bottom: 1%;
  background-color: white;
  color: rgba(0, 0, 0, 0.7);
  background-image: linear-gradient(to left top, #fffbdd, #fff7e8, #fff8f8, #fffcff, #ffffff);
}
.carte:hover{
  box-shadow: 2px 2px 4px #F4C430;
  text-decoration: none;
}
.red-text{
  float: right;
}
.red-text:hover{
  color: black;
  text-shadow: 1px 1px 3px #F4C430;
}
.titre{
  color: black;
  margin-bottom: 2%;
  margin-top: 7%;
  border: solid 3px black;
  text-shadow: 1px 1px 3px #F4C430;
  box-shadow: 2px 2px 4px #F4C430;
  font-family: 'Lato', sans-serif;
}
.placePic{
  width: 100%;
  height: auto;
  padding-top: 4%;
  padding-bottom: 4%;
  margin-left: 7%;
}
.placetype{
  margin-top: 5%;
  color: Black;
  text-shadow: 1px 1px 2px #F4C430;
  font-family: 'Lato', sans-serif;
}
.desc{
  margin-top: auto;
  margin-bottom: auto;
}
.iconlike{
  width: 25px;
  height: 25px;
  padding-right: 5%;
}
.icondislike{
  width: 25px;
  height: 25px;
  padding-right: 5%;
}
.iconetype{
  height: 50px;
  width: 50px;
  margin-left: 3%;
  margin-right: 2%;
}
.inactive{
  display: none;
}
</style>
