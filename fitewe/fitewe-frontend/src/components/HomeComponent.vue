<template>
  <div>
    <div class="container">
      <div class="row">
          <div class="titre display-4 col-5 text-center ml-auto mr-auto"> {{ name }} </div>
        </div>
    </div>
    <!-- Caroussel -->
    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div
          class="carousel-item active"
          v-for="(dest, id) in destination"
          :key="id"
        >
          <img
            @click="goTodetail(dest.dest_id)"
            class="d-block w-100"
            :src="dest.pics"
            alt="Slides"
          />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container">
      <div class="row">
          <div class="lieux h1 col-6 text-center ml-auto mr-auto"> Les lieux les plus visités </div>
        </div>
    </div>

    <!-- grid -->
    <div class="container pb-5">
      <div class="wrapper" id="myDiv">
        <!-- <div v-for="plac in places.data.places" v-bind:key="plac.id"> -->
        <div v-for="(plac, index) in places" v-bind:key="plac.id" :class="{ 'inactive': index > 7 }">
          <div
            class="place_details text-center pt-3"
            id="place_details"
            @click="goToPlacedDetail(plac.id)"
          >
            <span>
              <img :src="plac.place_images[0].pics" width="250" height="250" />
            </span>
            <br />
            <span id="place_name" class="pt-1">
              {{ plac.place_name }}
            </span>
            <!-- rating -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  methods: {
    goTodetail(id) {
      this.$router.push({
        name: "DestinationDetail",
        params: { id: id },
      });
    },
    goToPlacedDetail(id) {
      this.$router.push({
        name: "PlaceDetail",
        params: { id: id },
      });
    },
  },
  components: {},
  data() {
    return {
      places: null,
      destination: null,
      //   place_images: null,
    };
  },

  mounted() {
    const api = "http://127.0.0.1:8000/api/dest";
    // const token = localStorage.getItem("token");
    // , { headers: { Authorization: `Bearer ${token}` } }

    axios
      .get(api)
      .then((response) => {
        this.places = response.data.places;
        this.destination = response.data.destination_images;
        this.name = response.data.dest_name;
        // this.place_pics = response.console; // this.place_images = this.places.data.data[0].places[0].place_images;
        console.log(this.destination);
        console.log(this.places);
        // console.log(this.places.data.data[0].places[0].place_images[0].pics);
        // console.log(this.places.data.data[0].places[0].place_name);
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style scoped>
#carouselExampleIndicators {
  height: 50%;
  width: 100%;
  /* position: fixed; */
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.w-100 {
  align-content: center;
  width: 500px;
  height: 400px;
}

.wrapper {
  display: grid;
  margin-top: 20px;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
}

#place_name {
  text-align: center;
}

.inactive{
  display: none;
}

.titre{
    color: black;
  margin-bottom: 2%;
  margin-top: 4%;
  border: solid 3px black;
  text-shadow: 1px 1px 3px #F4C430;
  box-shadow: 2px 2px 4px #F4C430;
  font-family: 'Lato', sans-serif;
}

.lieux{
  margin-top: 50px;
  color: Black;
  text-shadow: 1px 1px 2px #F4C430;
  font-family: 'Lato', sans-serif;
  text-decoration: underline;
}
</style>
