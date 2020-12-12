<template>
    <div class="login-template container-fluid">
        <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="col-md-5">
                <!-- Login form -->
                <form v-on:submit.prevent="login">
                    <FlashMessage></FlashMessage>

                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input required v-model="username" type="text" class="form-control" id="username" placeholder="Nom d'utilisateur" name="username">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input required v-model="password" type="password" class="form-control" id="pwd" placeholder="Mot de passe" name="pwd">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Se connecter</button>
                    </div>
                    <div class="clearfix">
                        <div class="custom-control custom-switch float-left">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Se souvenir de moi</label>
                        </div>
                        <a href="#" class="float-right">Mot de passe oublié ?</a>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                Vous découvrez le site pour la première fois ? <br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero doloremque nisi molestias accusantium odio asperiores 
                    et ut expedita nesciunt adipisci suscipit ad nulla accusamus, dolorem nam! Repellat ad officiis velit.</p>
                <router-link :to="{name:'signup'}" type="button" class="btn btn-dark">S'inscrire</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import axios from '../backend/vue-axios/axios'
import store from '../store/index'
import { mapGetters } from 'vuex'
import FlashMessage from '@smartweb/vue-flash-message';

export default {
    name: 'LoginForm',

    data () {
        return {
            username: '',
            password: '',
            //user: []
        }
    },

    created () {
        this.checkCurrentLogin()
    },
    updated () {
        this.checkCurrentLogin()
    },

    computed: {
        ...mapGetters({ currentUser: 'currentUser' })
    },

    methods: {
        checkCurrentLogin () {
            if (this.currentUser != null) {
                this.$router.replace(this.$route.query.redirect || '/')
            }
        },

        login(){
            axios.post('/login', { username: this.username, password: this.password })
                .then(request => this.loginSuccessful(request))
                .catch(() => this.loginFailed())
        },

        loginSuccessful (req) {
            if (!req.data.access_token) {
                this.loginFailed()
                return
            }

            // Saving access_token to localStorage
            localStorage.access_token = req.data.access_token
            // Saving user to localStorage
            localStorage.userId = req.data.user.id
            localStorage.username = req.data.user.username
            localStorage.userFirstname = req.data.user.firstname
            localStorage.userLastname = req.data.user.lastname
            localStorage.userTel = req.data.user.tel
            localStorage.userEmail = req.data.user.userEmail
            localStorage.userAvatar = req.data.user.avatar
            localStorage.userAdminState = req.data.user.admin
            
            // this.user = req.data.user
            // console.log(this.user.username)

            this.$store.dispatch('login')
            this.error = false

            this.$router.replace(this.$route.query.redirect || '/')
        },

        loginFailed () {
            this.flashMessage.error({message: 'Nom d\'utilisateur et/ou Mot de passe incorrect(s) !'});
            this.$store.dispatch('logout')
            delete localStorage.access_token
        }
    },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap');

.login-template {
    margin-top: 10%;
    margin-bottom: 10%;
}

.row {
    font-family: Fira Sans;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.card {
  background: #fff;
  max-width: 360px;
  border-radius: 5px;
  margin: 60px auto;
}

</style>
