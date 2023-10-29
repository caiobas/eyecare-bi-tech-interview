<template>
  <div class="patients">
    <patients-header :items="getItems"></patients-header>
    <div class="patients-card">
      <router-view
        @patientName="updatePatientName"
        @patientRoute="updatePatientRoute"
      ></router-view>
    </div>
  </div>
</template>

<script>
import PatientsHeader from "../../components/PatientsHeader.vue";

export default {
  name: "IndexPatients",
  components: {
    PatientsHeader,
  },
  data() {
    return {
      patientName: "",
      patientRoute: "",
    };
  },
  computed: {
    getItems() {
      if (this.$route.path === "/patients/list") {
        return [];
      }

      if (this.$route.path === "/patients/form/create") {
        return [
          { text: "Pacientes", to: "/patients" },
          { text: "Novo paciente", href: "#", active: true },
        ];
      }

      if (this.$route.path === "/patients/form/details") {
        return [
          { text: "Pacientes", to: "/patients" },
          { text: this.patientName, href: "#", active: true },
        ];
      }

      if (this.$route.path === "/patients/form/edit") {
        return [
          { text: "Pacientes", to: "/patients" },
          {
            text: this.patientName,
            to: {
              name: "form-details-patients",
              params: { action: "details" },
            },
          },
          { text: "Editar paciente", href: "#", active: true },
        ];
      }

      return [];
    },
  },
  methods: {
    updatePatientName(name) {
      this.patientName = name;
    },
    updatePatientRoute(route) {
      this.patientRoute = route;
    },
  },
};
</script>

<style>
.patients {
  height: 91.5vh;

  padding: 20px;
}

.patients-card {
  height: 90%;
  width: 100%;
  background-color: white;
  border-radius: 15px;
  padding: 20px;
}
</style>
