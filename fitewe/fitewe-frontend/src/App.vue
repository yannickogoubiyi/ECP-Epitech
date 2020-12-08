<template>
  <div class="vue-template">
    <!-- Navigation -->
    <nav class="navbar shadow bg-white rounded justify-content-between flex-nowrap flex-row fixed top">
      <div class="container">
        <a class="navbar-brand float-left" href="https://www.positronx.io" target="_blank">
           FITEWE
        </a>
        <ul class="nav navbar-nav flex-row float-right">
          <li class="nav-item">
            <router-link class="nav-link pr-3" to="/login">Se connecter</router-link>
          </li>
          <li class="nav-item">
            <router-link class="btn btn-outline-primary" to="/">S'inscrire</router-link>
          </li>
        </ul>
      </div>
    </nav>
    <div class="App">
      <div class="vertical-center">
        <div class="inner-block">
          <router-view />
        </div>
      </div>
      <div class="container-fluid footer">
        <div class="row">
          <div class="col-4 text-center">
            <h3 class="footertitle">Liens utiles</h3>
            <a class="footerlink" href="#">A propos de nous</a><br>
            <a class="footerlink" href="#">F.A.Q</a><br>
            <a class="footerlink" href="#">Ambassade du Bénin</a><br>
            <a class="footerlink" href="#">Communauté des voyageurs</a><br>
            <a class="footerlink" href="#">Toutes nos destinations</a><br>
            <a class="footerlink" href="#">Locations de voitures</a><br>
          </div>
          <div class="col-4 text-center">
            <h3 class="footertitle">Nos partenaires</h3>
            <a class="footerlink" href="#">Booking.yeah</a><br>
            <a class="footerlink" href="#">Lonely Planet</a><br>
            <a class="footerlink" href="#">Kayak</a><br>
            <a class="footerlink" href="#">Expédia</a><br>

          </div>
          <div class="col-4 text-center">
            <h3 class="footertitle d-flex justify-content-center">Confidentialité</h3>
            <a class="footerlink" href="#">Informations coronavirus</a><br>
            <a class="footerlink" href="#">Service client</a><br>
            <a class="footerlink" href="#">Conditions générales d'utilisation</a><br>
            <a class="footerlink" href="#">Confidentialité</a><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.footer{
  margin-top: 3%;
}
.footerlink{
  font-size: larger;
  color: rgba(0, 0, 0, 0.7);
}
.footerlink:hover{
  font-size: larger;
  color: #f57f17;
}
.footertitle{
  color: rgba(0, 0, 0, 0.7);
  border-bottom: solid 1px rgba(0, 0, 0, 0.7);
  border-right: solid 1px rgba(0, 0, 0, 0.7);
  width: 50%;
  margin-left: 25%
}
</style>