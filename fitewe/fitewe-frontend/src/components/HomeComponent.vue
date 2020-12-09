<template>
  <div>
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
          <div>
            <a href="http://www.google.com" target="_blank">
              <img class="d-block w-100" :src="dest.pics" alt="First slide" />
            </a>
          </div>
        </div>

        <!-- <div class="carousel-item">
          <img
            class="d-block w-100"
            src="https://zupimages.net/up/20/48/g33s.png"
            alt="Second slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block w-100"
            src="https://zupimages.net/up/20/48/mi1b.png"
            alt="Third slide"
          />
        </div> -->
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

    <!-- grid -->
    <div class="container">
      <div class="wrapper" id="myDiv">
        <!-- <div v-for="plac in places.data.places" v-bind:key="plac.id"> -->
        <div v-for="plac in places" v-bind:key="plac.id">
          <div class="place_details" id="place_details">
            <span>
              <img :src="plac.place_images[0].pics" width="250" height="250" />
            </span>
            <br />
            <span id="place_name">
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
  margin-top: 80px;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
}

#place_name {
  text-align: center;
}
</style>
