import JwtDecode from 'jwt-decode'

export default class User {
  static from (access_token) {
    try {
      let obj = JwtDecode(access_token)
      console.log("Object token :", obj)
      return new User(obj)
    } catch (_) {
      return null
    }
  }

  constructor ({ id, username, admin }) {
    this.id = id // eslint-disable-line camelcase
    this.username = username
    this.admin = admin
  }

  get isAdmin () {
    return this.admin
  }
}