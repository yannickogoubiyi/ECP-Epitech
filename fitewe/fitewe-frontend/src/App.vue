<template>
  <div class="vue-template">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <a class="navbar-brand" href="#">FITEWE</a>
     
      <form class="form-inline my-3 my-lg-0 flex-fill justify-content-center">
          <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>

       <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Destinations</a>
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
