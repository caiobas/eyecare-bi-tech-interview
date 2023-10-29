import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { PATIENTS } from "../constants/urls";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    patients: {},
    patient: {},
  },
  getters: {
    patients(state) {
      return { ...state.patients };
    },
    patient(state) {
      return { ...state.patient };
    },
  },
  mutations: {
    SET_ITEMS(state, patients) {
      state.patients = patients;
    },
    SET_ITEM(state, patient) {
      state.patient = patient;
    },
  },
  actions: {
    async loadPatients({ commit }) {
      try {
        const response = await axios.get(`${PATIENTS.PATIENTS}`);
        commit("SET_ITEMS", { ...response.data });
      } catch (error) {
        return Promise.reject(error);
      }
    },
    async loadPatient({ commit }, cpf) {
      try {
        const response = await axios.get(`${PATIENTS.PATIENTS}/${cpf}`);
        commit("SET_ITEM", { ...response.data });
      } catch (error) {
        return Promise.reject(error);
      }
    },
    async createPatient(_, data) {
      try {
        await axios.post(`${PATIENTS.PATIENTS}`, data);
      } catch (error) {
        return Promise.reject(error);
      }
    },
    async updatePatient(_, data) {
      try {
        await axios.patch(`${PATIENTS.PATIENTS}/${data.cpf}`, data.body);
      } catch (error) {
        return Promise.reject(error);
      }
    },
    async deletePatient(_, cpf) {
      try {
        await axios.delete(`${PATIENTS.PATIENTS}/${cpf}`);
      } catch (error) {
        return Promise.reject(error);
      }
    },
  },
});
