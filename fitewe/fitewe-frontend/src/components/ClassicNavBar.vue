<template>
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
            <router-link class="nav-link pr-3" to="/login">Se connecter</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link pr-3" to="/signup">S'inscrire</router-link>
          </li>
        </ul>
      </div>
    </nav> 
</template>

<script>
export default {
    name: 'ClassicNavBar',
}
</script>

<style>

</style>