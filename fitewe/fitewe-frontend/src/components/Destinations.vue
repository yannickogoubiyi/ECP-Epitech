<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <div class="display-3 titre">Les plus belles villes du Bénin</div>
      </div>
    </div>
    <div class="row">
      <!-- <button type="button" class="col-4 text-center carte rounded-pill shadow-lg" v-for="destination in destinations" v-bind:key="destination.id">
          <router-link class="nav-link pr-3" :to="{ name: 'DestinationDetail', params: {id: destination.id }  }">
          <h2> {{ destination.dest_name }} </h2>
          </router-link>
        </button>  -->

      <router-link
        :to="{ name: 'DestinationDetail', params: { id: destination.id } }"
        type="button"
        class="col-4 text-center carte rounded-pill shadow-lg nav-link pr-3"
        v-for="destination in destinations"
        v-bind:key="destination.id"
      >
        <h2>{{ destination.dest_name }}</h2>
      </router-link>
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
    destinationList() {
      axios
        .get("http://localhost:8000/api/destinations")
        .then((response) => (this.destinations = response.data.data))
        .catch((error) => console.log(error));
      // console.log(this.destinations)
    },
  },
  mounted() {
    this.destinationList();
  },
};
</script>

<style scoped>
.carte {
  display: inline-block;
  margin-left: 8.25%;
  margin-right: 8.25%;
  margin-top: 2%;
  margin-bottom: 2%;
  border: solid 3px #f4c430;
  padding-top: 1%;
  padding-bottom: 1%;
  background-color: white;
  color: rgba(0, 0, 0, 0.7);
}
.carte:hover {
  background-color: #fff2e0;
}
.titre {
  color: #f4c430;
  margin-bottom: 2%;
  margin-top: 2%;
}
</style>
