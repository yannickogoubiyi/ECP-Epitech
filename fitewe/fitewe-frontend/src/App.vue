<template>
  <div class="vue-template">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <a class="navbar-brand" href="#">FITEWE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
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
            <router-link class="btn btn-outline-primary" to="/">S'inscrire</router-link>
          </li>
        </ul>
    
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </nav> 

    <div class="App">
      <div class="container">
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

.page-footer{
  background-color: #F4C430;
}

.footer-copyright{
  background-color: #daae2d;
}

</style>
