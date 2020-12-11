<template>
  <div class="vue-template">
    <!-- Navigation -->
    <!-- Standard navbar -->
    <template v-if="!currentUser">
      <ClassicNavBar></ClassicNavBar>
    </template>

    <!-- User navbar -->
    <template v-if="currentUser">
      <UserNavBar></UserNavBar>
    </template>

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
import Navbar from '@/components/Navbar'
import ClassicNavBar from './components/ClassicNavBar'
import store from './store/index'
import { mapGetters } from 'vuex'

export default {
  name: 'app',

  components: {
    UserNavBar: Navbar,
    ClassicNavBar,
  },

  computed: {
    ...mapGetters({ currentUser: 'currentUser' })
  },

  created () {
    this.checkCurrentLogin()
  },

  updated () {
    this.checkCurrentLogin()
  },

  methods: {
    checkCurrentLogin () {
      if (this.currentUser == null && this.$route.path !== '/') {
        //this.$router.push('/?redirect=' + this.$route.path)
        //console.log(this.currentUser)
      }
    }
  }

}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

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

.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}

.custom-toggler.navbar-toggler {
  border-color: rgb(255,255,255);
} 

.page-footer{
  background-color: #F4C430;
}

.footer-copyright{
  background-color: #daae2d;
}

</style>
