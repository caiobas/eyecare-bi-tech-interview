<template>
  <div class="patients-header">
    <div class="patients-header-title">
      <base-breadcrumb v-if="items.length" :items="items"></base-breadcrumb>
      <base-title v-else>Pacientes</base-title>
    </div>
    <div class="patients-button">
      <base-button v-if="showButton" :to="getButtonRoute" variant="primary">{{
        getButtonName
      }}</base-button>
    </div>
  </div>
</template>

<script>
import BaseBreadcrumb from "./BaseBreadcrumb.vue";
import BaseButton from "./BaseButton.vue";
import BaseTitle from "./BaseTitle.vue";

export default {
  name: "PatientsHeader",
  components: {
    BaseButton,
    BaseBreadcrumb,
    BaseTitle,
  },
  props: {
    routeName: String,
    items: Array,
  },
  data() {
    return {
      buttonData: {
        "list-patients": {
          name: "Novo Paciente",
          route: { name: "form-create-patients", params: { action: "create" } },
        },
        "form-details-patients": {
          name: "Editar Paciente",
          route: { name: "form-edit-patients", params: { action: "edit" } },
        },
      },
    };
  },
  computed: {
    showButton() {
      return this.$route.name in this.buttonData;
    },
    getButtonRoute() {
      return this.buttonData[this.$route.name].route;
    },
    getButtonName() {
      return this.buttonData[this.$route.name].name;
    },
  },
};
</script>

<style>
.patients-header {
  height: 10%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.patients-header-title {
  width: 100%;
  font-size: larger;
}

.patients-button {
  min-width: 150px;
}
</style>
