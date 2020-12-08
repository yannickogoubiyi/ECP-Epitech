<template>
  <div class="vue-tempalte">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">FITEWE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <form class="navbar-nav mr-auto form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"> Destinations</a></li>
          <li><a class="ml-3" href="#"><i class="fa fa-user" aria-hidden="true"> S'inscrire</i></a></li>
          <li><a class="ml-3" href="#"><i class="fa fa-sign-in" aria-hidden="true"> Se connecter</i></a></li>                 
        </ul>
      </div>
    </nav>
    <div class="App">
      <div class="vertical-center">
        <div class="inner-block">
          <router-view />
        </div>
      </div>
    </div>
  </div>
</template>
