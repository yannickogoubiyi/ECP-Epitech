import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: () => import("../components/HomeComponent.vue")
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../components/Login.vue")
  },
  {
    path: "/logout",
    name: "logout",
    component: () => import("../components/Logout.vue")
  },
  {
    path: '/signup',
    name: 'signup',
    component: () => import('../components/Signup.vue')
  },
  {
    path: '/forgot-password',
    name: 'forgot-password',
    component: () => import('../components/ForgotPassword.vue')
  },
  {
    path: '/destinations',
    name: 'destinations',
    component: () => import('../components/Destinations.vue')
  },
  {
    path: '/destinations/:id',
    name: 'DestinationDetail',
    component: () => import('../components/DestinationsDetails.vue')
  },
  {
    path: '/places/:id',
    name: 'PlaceDetail',
    component: () => import('../components/PlaceDetails.vue')
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;

