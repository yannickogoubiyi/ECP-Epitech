<template>
  <div>
    <!-- Caroussel -->

    <agile :autoplay="true" :slidesToShow="1">
      <div
        class="slide"
        v-for="(dest, index) in destination"
        v-bind:key="dest.id"
        :class="{ inactive: index != O }"
      >
        <img
          @click="goTodetail(dest.dest_id)"
          class="d-block w-100"
          :src="dest.pics"
          alt="Slides"
        />
      </div>
      <div
        class="slide"
        v-for="(dest, index) in destination"
        v-bind:key="dest.id"
        :class="{ inactive: index != 1 }"
      >
        <img
          @click="goTodetail(dest.dest_id)"
          class="d-block w-100"
          :src="dest.pics"
          alt="Slides"
        />
      </div>
      <div
        class="slide"
        v-for="(dest, index) in destination"
        v-bind:key="dest.id"
        :class="{ inactive: index != 2 }"
      >
        <img
          @click="goTodetail(dest.dest_id)"
          class="d-block w-100"
          :src="dest.pics"
          alt="Slides"
        />
      </div>
    </agile>

    <!-- grid -->
    <div class="container">
      <div class="wrapper" id="myDiv">
        <!-- <div v-for="plac in places.data.places" v-bind:key="plac.id"> -->
        <div v-for="plac in places" v-bind:key="plac.id">
          <div
            class="place_details"
            id="place_details"
            @click="goToPlacedDetail(plac.id)"
          >
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
import { VueAgile } from "vue-agile";
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
  components: {
    agile: VueAgile,
  },
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
.inactive {
  display: none;
}
</style>
