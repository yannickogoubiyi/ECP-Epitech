import User from '@/models/User'
import * as MutationTypes from '@/store/mutation_types'

const state = {
  user: User.from(localStorage.access_token)
}

const getters = {
    currentUser (state) {
      return state.user
    }
}

const mutations = {
    [MutationTypes.LOGIN] (state) {
      state.user = User.from(localStorage.access_token)
    },
    [MutationTypes.LOGOUT] (state) {
      state.user = null
    }
}

const actions = {
    login ({ commit }) {
      commit(MutationTypes.LOGIN)
    },
  
    logout ({ commit }) {
      commit(MutationTypes.LOGOUT)
    }
}

export default {
  state,
  mutations,
  getters,
  actions
}