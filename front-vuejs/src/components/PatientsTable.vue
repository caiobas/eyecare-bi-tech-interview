<template>
  <div v-if="items.length" class="patients-table">
    <div class="patients-table-title">
      <div class="patients-table-title-name">Nome do paciente</div>
      <div class="patients-table-title-fields">CPF</div>
      <div class="patients-table-title-fields">Celular</div>
      <div class="patients-table-title-fields">Data de nascimento</div>
    </div>

    <div
      v-for="(item, index) in getItems"
      :key="index"
      class="patients-table-data"
    >
      <div class="patients-table-title-name">{{ item.nome }}</div>
      <div class="patients-table-title-fields">{{ item.CPF }}</div>
      <div class="patients-table-title-fields">{{ item.celular }}</div>
      <div class="patients-table-title-fields">
        {{ item.dataDeNascimento }}
      </div>
      <div class="patients-table-title-icon">
        <b-icon
          @click="clickHandler(item.cPFPlain)"
          icon="eye-fill"
          font-scale="1.5"
        ></b-icon>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PatientsTable",
  props: {
    items: { type: Array, default: () => [] },
    perPage: Number,
    currentPage: Number,
  },
  data() {
    return {
      patientsList: [],
    };
  },
  methods: {
    formatCPF(cpf) {
      return (
        cpf.substring(0, 3) +
        "." +
        cpf.substring(3, 6) +
        "." +
        cpf.substring(6, 9) +
        "." +
        cpf.substring(9, 11)
      );
    },
    formatCelular(celular) {
      return (
        "(" +
        celular.substring(0, 2) +
        ") " +
        celular.substring(2, 7) +
        "-" +
        celular.substring(7, 11)
      );
    },
    formatPatientsList(patientsList) {
      const formattedList = patientsList.map((a) => {
        return {
          nome: a.name,
          CPF: this.formatCPF(a.cpf),
          cPFPlain: a.cpf,
          celular: this.formatCelular(a.cell_phone),
          dataDeNascimento: a.birthday,
        };
      });
      return formattedList;
    },
    async clickHandler(cpf) {
      try {
        await this.$store.dispatch("loadPatient", cpf);

        this.$router.push({
          name: "form-details-patients",
          params: { action: "details" },
        });
      } catch (e) {
        this.$toast("Patient not found", {
          timeout: 5000,
          type: "error",
        });
      }
    },
  },
  computed: {
    getItems() {
      const first = this.perPage * this.currentPage - this.perPage;
      const last =
        this.perPage * this.currentPage < this.items.length
          ? this.perPage * this.currentPage - 1
          : this.items.length - 1;

      const itemsArr = [...Array(last - first + 1).keys()].map(
        (x) => x + first
      );

      const itemsToShow = itemsArr.map((i) => this.items[i]);
      return this.formatPatientsList(itemsToShow);
    },
  },
};
</script>

<style>
.patients-table {
  display: flex;
  flex-direction: column;
  justify-items: space-between;
  border: 1px solid #c6cdea;
  border-radius: 10px;
}

.patients-table-title {
  padding: 8px 4px;
  display: flex;
  background-color: #f4f5fb;
  border: 1px transparent;
  border-radius: 10px 10px 0 0;
  color: #0e1958;
}

.patients-table-title > * {
  font-weight: 600;
}

.patients-table-title-name {
  width: 40%;
  padding: 8px 4px;
}

.patients-table-title-fields {
  width: 18%;
  padding: 8px 4px;
}

.patients-table-data {
  display: flex;
  padding: 7px 4px;
  border-top: 1px solid #c6cdea;
  color: #525b79;
}

.patients-table-title-icon {
  display: flex;
  align-items: center;
  color: #3451ee;
}

.patients-table-title-icon:hover {
  cursor: pointer;
}
</style>
