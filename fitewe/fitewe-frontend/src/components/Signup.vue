<template>
    <div class="signup-template row">
        <div class="col-sm-5">
            <img class="card-img-top" src="@/assets/images/dantokpa.png" alt="Card image cap">
        </div>
        <div class="col-sm-7">
            <div class="card booking-card shadow-sm p-3 mb-5 bg-white rounded ">
                <!-- Card content -->
                <div class="card-body">
                    <form v-on:submit="register">
                        <h3>Inscription</h3>
                        <div class="alert alert-danger" v-if="error">{{ error }}</div>

                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input required v-model="username" type="text" class="form-control form-control-lg" id="username" name="username"/>
                        </div>

                        <div class="form-group">
                            <label for="firstname">Nom</label>
                            <input required v-model="firstname" type="text" class="form-control form-control-lg" id="firstname" name="firstname"/>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Prénom(s)</label>
                            <input required v-model="lastname" type="text" class="form-control form-control-lg" id="lastname" name="lastname"/>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input required v-model="password" type="password" class="form-control form-control-lg" id="password" name="password"/>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmation du mot de passe </label>
                            <input required v-model="password_confirmation" type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation"/>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required v-model="email" type="email" class="form-control form-control-lg" id="email" name="email"/>
                        </div>

                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input v-model="tel" type="tel" class="form-control form-control-lg" id="tel" name="tel"/>
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
import axios from '../backend/vue-axios/axios'
import { mapActions } from "vuex";

export default {
    name: 'SignupForm',

    data () {
        return {
            username: '',
            firstname: '',
            lastname: '',
            password: '',
            password_confirmation: '',
            email: '',
            tel: '',
            error: null
        }
    }, 

    methods:{
        register(e){
            e.preventDefault();
            axios.post('/register', {username: this.username, firstname: this.firstname, 
            lastname: this.lastname, password: this.password, password_confirmation: this.password_confirmation, email: this.email, tel: this.tel})
                .then(request => {
                    this.registerSuccessful(request)
                    this.error = request.data.error
                    //console.log(request)

                })
                .catch((error) => {
                    this.registerFailed()})
        },

        registerSuccessful(req){
            this.$router.replace(this.$route.query.redirect || '/login')
        },

        registerFailed(err){
            this.error = 'Erreur !'
        }
    }
}
</script>