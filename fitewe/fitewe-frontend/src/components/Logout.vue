<script>
import store from '../store/auth'

export default {
  name: 'Logout',

  created () {
    delete localStorage.access_token
    delete localStorage.userId
    delete localStorage.username
    delete localStorage.userFirstname
    delete localStorage.userLastname
    delete localStorage.userTel 
    delete localStorage.userEmail
    delete localStorage.userAvatar
    delete localStorage.userAdminState

    this.$store.dispatch('logout')
    this.$router.push('/')
  }
}
</script>