import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "../views/HomeView.vue";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  base: import.meta.env.BASE_URL,
  routes: [
    {
      path: "/",
      redirect: "/patients",
    },
    {
      path: "/patients",
      name: "patients",
      component: () => import("../views/Patients/Index.vue"),
      redirect: "/patients/list",
      children: [
        {
          path: "/patients/list",
          name: "list-patients",
          component: () => import("../views/Patients/ListPatients.vue"),
        },
        {
          path: "/patients/form/create",
          name: "form-create-patients",
          component: () => import("../views/Patients/FormPatients.vue"),
        },
        {
          path: "/patients/form/edit",
          name: "form-edit-patients",
          component: () => import("../views/Patients/FormPatients.vue"),
        },
        {
          path: "/patients/form/details",
          name: "form-details-patients",
          component: () => import("../views/Patients/FormPatients.vue"),
        },
      ],
    },
  ],
});

export default router;
