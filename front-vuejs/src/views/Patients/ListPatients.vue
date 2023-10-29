<template>
  <div class="patients-card-content">
    <div>
      <b-input-group class="patients-search">
        <b-input-group-prepend class="patients-search-prepend" is-text>
          <b-icon icon="search" font-scale="1"></b-icon>
        </b-input-group-prepend>

        <b-form-input
          v-model="search"
          placeholder="Buscar por nome do paciente ou CPF"
          type="text"
        ></b-form-input>
      </b-input-group>

      <patients-table
        v-if="patientsListSearched.length"
        :currentPage="currentPage"
        :items="patientsListSearched"
        :perPage="perPage"
      >
      </patients-table>

      <h1 style="text-align: center" v-else>Cadastre um novo paciente!</h1>
    </div>

    <b-pagination
      class="patients-pagination"
      v-if="patientsListSearched.length"
      v-model="currentPage"
      :total-rows="totalRows"
      :per-page="perPage"
      first-number
      last-number
    ></b-pagination>
  </div>
</template>

<script>
import PatientsTable from "../../components/PatientsTable.vue";

export default {
  name: "ListPatients",
  components: {
    PatientsTable,
  },
  data() {
    return {
      patientsList: [],
      currentPage: 1,
      perPage: 9,
      search: "",
    };
  },
  computed: {
    patientsListSearched() {
      if (this.search.length < 1) {
        return this.patientsList;
      }

      return this.patientsList.filter((patient) => {
        if (
          patient.cpf.toLowerCase().includes(this.search.toLowerCase()) ||
          patient.name.toLowerCase().includes(this.search.toLowerCase())
        ) {
          return patient;
        }
      });
    },
    totalRows() {
      return this.patientsListSearched.length;
    },
  },
  mounted: async function () {
    await this.$store.dispatch("loadPatients", 1);

    this.patientsList = this.$store.getters.patients.data;
  },
};
</script>

<style>
.patients-card-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}

.patients-search {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}

.patients-search-prepend {
  width: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.patients-pagination {
  display: flex;
  justify-content: end;
  margin: 0;
}
</style>
