<template>
    <div class="signup-template row">
        <div class="col-sm-5">
            <img class="card-img-top" src="@/assets/images/dantokpa.png" alt="Card image cap">
        </div>
        <div class="col-sm-7">
            <div class="card booking-card shadow-sm p-3 mb-5 bg-white rounded ">
                <!-- Card content -->
                <div class="card-body">
                    <form>
                        <h3>Inscription</h3>

                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username"/>
                        </div>

                        <div class="form-group">
                            <label for="firstname">Nom</label>
                            <input type="text" class="form-control form-control-lg" id="firstname" name="firstname"/>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Prénom(s)</label>
                            <input type="text" class="form-control form-control-lg" id="lastname" name="lastname"/>
                        </div>

                        <div class="form-group">
                            <label for="pwd1">Mot de passe</label>
                            <input type="password" class="form-control form-control-lg" id="pwd1" name="pwd1"/>
                        </div>

                        <div class="form-group">
                            <label for="pwd2">Confirmation du mot de passe </label>
                            <input type="password" class="form-control form-control-lg" id="pwd2" name="pwd2"/>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"/>
                        </div>

                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="tel" class="form-control form-control-lg" id="tel" name="tel"/>
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg btn-block">S'inscrire</button>

                        <p class="forgot-password text-center">
                            Vous disposez déjà d'un compte ?
                            <router-link :to="{name: 'login'}">Se connecter</router-link>
                        </p>
                    </form>
                </div>
            </div>
        <!-- Card -->
        </div>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap');

.signup-template{
    margin-top: 5%;
    margin-bottom: 5%;
    margin-right: 5%;
    margin-left: 5%;
}

</style>

<script>
export default {
  data () {
    return {}
  }
}
</script>
