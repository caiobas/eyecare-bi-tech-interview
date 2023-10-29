<template>
  <div class="form-patients">
    <base-title>{{ formTitle }}</base-title>

    <hr class="form-patients-divider" />
    <validation-observer ref="observer" v-slot="{ handleSubmit }">
      <b-form class="form-patients-form">
        <div class="form-patients-form-content">
          <div class="form-patients-row">
            <validation-provider
              class="form-patients-form-name"
              name="Name"
              :rules="{ required: true }"
              v-slot="validationContext"
            >
              <b-form-group label="Nome completo" label-for="name">
                <b-form-input
                  id="name"
                  v-model="patient.name"
                  type="text"
                  placeholder="Descrever"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-input>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="name-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>

            <validation-provider
              class="form-patients-form-cpf"
              vid="cpf"
              name="CPF"
              :rules="{ required: true, min: 14 }"
              v-slot="validationContext"
            >
              <b-form-group label="CPF" label-for="cpf">
                <b-form-input
                  id="cpf"
                  v-model="patient.cpf"
                  v-mask="'###.###.###-##'"
                  type="text"
                  placeholder="000.000.000-00"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-input>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="cpf-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>

            <validation-provider
              class="form-patients-form-rg"
              name="RG"
              :rules="{ required: true, min: 12 }"
              v-slot="validationContext"
            >
              <b-form-group label="RG" label-for="rg">
                <b-form-input
                  id="rg"
                  v-model="patient.rg"
                  v-mask="'##.###.###-#'"
                  type="text"
                  placeholder="00.000.000-0"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-input>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="rg-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>
          </div>
          <div class="form-patients-row">
            <validation-provider
              class="form-patients-form-birthday"
              name="Birthday"
              :rules="{ required: true }"
              v-slot="validationContext"
            >
              <b-form-group label="Data de nascimento" label-for="birthday">
                <b-form-input
                  id="birthday"
                  v-model="patient.birthday"
                  type="date"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-input>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="birthday-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>

            <validation-provider
              class="form-patients-form-gender"
              name="Gender"
              :rules="{ required: true }"
              v-slot="validationContext"
            >
              <b-form-group label="Sexo biológico" label-for="gender">
                <b-form-select
                  class="form-control"
                  id="gender"
                  v-model="patient.gender"
                  :options="genderOptions"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-select>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="gender-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>

            <validation-provider
              class="form-patients-form-cell_phone"
              name="Cell_phone"
              :rules="{ required: true, min: 15 }"
              v-slot="validationContext"
            >
              <b-form-group label="Celular" label-for="cell_phone">
                <b-form-input
                  id="cell_phone"
                  v-model="patient.cell_phone"
                  v-mask="'(##) #####-####'"
                  type="text"
                  placeholder="(00) 00000-0000"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-input>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="cell_phone-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>

            <validation-provider
              class="form-patients-form-email"
              name="Email"
              :rules="{ email: true }"
              v-slot="validationContext"
            >
              <b-form-group>
                <label for="email"
                  >E-mail
                  <span class="form-patients-form-optional">(Opcional)</span>
                </label>
                <b-form-input
                  id="email"
                  v-model="patient.email"
                  type="email"
                  placeholder="Descrever"
                  :disabled="isDisabled"
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-input>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="email-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>
          </div>

          <div class="form-patients-row">
            <validation-provider
              class="form-patients-form-description"
              name="Description"
              :rules="{}"
              v-slot="validationContext"
            >
              <b-form-group>
                <label for="description">
                  Descrição
                  <span class="form-patients-form-optional">(Opcional)</span>
                </label>
                <b-form-textarea
                  id="description"
                  v-model="patient.description"
                  type="text"
                  placeholder="Descrever"
                  :disabled="isDisabled"
                  rows="1"
                  max-rows="4"
                  no-resize
                  :state="
                    ['create', 'edit'].includes(getAction)
                      ? getValidationState(validationContext)
                      : null
                  "
                ></b-form-textarea>
                <b-form-invalid-feedback
                  class="form-feedback"
                  id="description-feedback"
                  >{{ validationContext.errors[0] }}</b-form-invalid-feedback
                >
              </b-form-group>
            </validation-provider>
          </div>
        </div>

        <div class="form-patients-form-buttons">
          <b-button
            class="form-patients-form-cancel"
            v-if="showButtons"
            @click="handleCancel"
            variant="outline-danger"
          >
            {{ cancelBtnText }}
          </b-button>

          <b-modal id="delete-modal" title="BootstrapVue">
            <template #modal-header>
              <div class="form-modal-header">
                <h4>Excluir paciente</h4>
              </div></template
            >
            <p class="my-4">
              Atenção! Ao excluir esse paciente,
              <strong>essa ação não poderá ser desfeita</strong>. Deseja
              realmente continuar?
            </p>
            <template #modal-footer>
              <div class="form-patients-form-buttons">
                <b-button
                  class="form-patients-form-cancel"
                  @click="closeModal"
                  variant="outline-danger"
                >
                  Cancelar
                </b-button>

                <b-button
                  class="form-patients-form-submit"
                  @click="confirmDelete"
                  variant="primary"
                >
                  Confirmar
                </b-button>
              </div>
            </template>
          </b-modal>

          <b-button
            class="form-patients-form-submit"
            v-if="showButtons"
            type="submit"
            @click.stop.prevent="onSubmit"
            variant="primary"
          >
            {{ submitBtnText }}
          </b-button>
        </div>
      </b-form>
    </validation-observer>
  </div>
</template>

<script>
import BaseTitle from "../../components/BaseTitle.vue";
import { ValidationObserver, ValidationProvider } from "vee-validate";
import { extend } from "vee-validate";
import { required, min, email } from "vee-validate/dist/rules";

extend("required", {
  ...required,

  message: "Campo obrigatório",
});
extend("min", {
  ...min,
  message: "Campo não é válido",
});
extend("email", {
  ...email,
  message: "Campo não é válido",
});

export default {
  name: "FormPatients",
  components: {
    BaseTitle,
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      cpfOld: "",
      patient: {
        name: "",
        cpf: "",
        rg: "",
        birthday: null,
        gender: null,
        cell_phone: "",
        email: "",
        description: "",
      },
      genderOptions: [
        { text: "Selecionar", value: null },
        { text: "Masculino", value: "m" },
        { text: "Feminino", value: "f" },
      ],
    };
  },
  computed: {
    getAction() {
      return this.$route.params.action ?? "";
    },
    formTitle() {
      if (this.getAction === "create") {
        return "Cadastro de novo paciente";
      }

      if (this.getAction === "edit") {
        return "Editar paciente";
      }

      if (this.getAction === "details") {
        return "Dados do paciente";
      }

      return "";
    },
    isDisabled() {
      return this.$route.name === "form-details-patients";
    },
    showButtons() {
      return ["edit", "create"].includes(this.getAction);
    },
    cancelBtnText() {
      if (this.getAction === "edit") {
        return "Excluir paciente";
      }

      if (this.getAction === "create") {
        return "Cancelar";
      }

      return "";
    },
    submitBtnText() {
      if (this.getAction === "edit") {
        return "Atualizar paciente";
      }

      if (this.getAction === "create") {
        return "Salvar paciente";
      }

      return "";
    },
  },
  watch: {
    "$route.params.action": {
      handler: async function (newAction, oldAction) {
        if (newAction === "details" && oldAction === "edit") {
          await this.$store.dispatch("loadPatient", this.cpfOld);
          this.patient = this.$store.getters.patient.data;
        }
      },
      deep: true,
      immediate: true,
    },
  },
  methods: {
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
    formatPatient(patient) {
      let patientFormatted = {
        full_name: patient.name,
        cpf: patient.cpf.replace(/\D/g, ""),
        rg: patient.rg.replace(/\D/g, ""),
        birthday: patient.birthday,
        gender: patient.gender,
        cell_phone: patient.cell_phone.replace(/\D/g, ""),
      };

      if (patient.email && patient.email.length) {
        patientFormatted = {
          ...patientFormatted,
          email: patient.email,
        };
      }

      if (patient.description && patient.description.length) {
        patientFormatted = {
          ...patientFormatted,
          description: patient.description,
        };
      }

      return patientFormatted;
    },
    async onSubmit() {
      const valid = await this.$refs.observer.validate();

      if (!valid) {
        this.$toast("Preencha todos os campos corretamente para continuar!", {
          timeout: 5000,
          type: "error",
        });
        return;
      }

      const patientSubmit = this.formatPatient(this.patient);
      if (this.getAction === "create") {
        try {
          await this.$store.dispatch("createPatient", patientSubmit);

          this.$toast("Paciente criado com sucesso!", {
            timeout: 5000,
            type: "success",
          });

          this.$router.push({ name: "list-patients" });
        } catch (e) {
          const errors = Object.keys(e.response.data.errors);
          errors.forEach((key) => {
            errors[key] = "Campo inválido";
          });

          this.$refs.observer.setErrors(errors);

          this.$toast(e.response.data.message, {
            timeout: 5000,
            type: "error",
          });
        }
      }

      if (this.getAction === "edit") {
        try {
          await this.$store.dispatch("updatePatient", {
            body: patientSubmit,
            cpf: this.cpfOld,
          });

          this.$toast("Paciente editado com sucesso!", {
            timeout: 5000,
            type: "success",
          });

          this.$router.push({ name: "list-patients" });
        } catch (e) {
          const errors = Object.keys(e.response.data.errors);
          errors.forEach((key) => {
            errors[key] = "Campo inválido";
          });

          this.$refs.observer.setErrors(errors);

          this.$toast(e.response.data.message, {
            timeout: 5000,
            type: "error",
          });
        }
      }
    },
    handleCancel() {
      if (this.getAction === "create") {
        this.$router.push({ name: "list-patients" });
      }
      if (this.getAction === "edit") {
        this.$bvModal.show("delete-modal");
      }
    },
    closeModal() {
      this.$bvModal.hide("delete-modal");
    },
    async confirmDelete() {
      try {
        await this.$store.dispatch("deletePatient", this.cpfOld);

        this.$toast("Paciente deletado com sucesso!", {
          timeout: 5000,
          type: "success",
        });
        this.$bvModal.hide("delete-modal");
        this.$router.push({ name: "list-patients" });
      } catch (e) {
        this.$toast("Algo deu errado, por favor contactar suporte!", {
          timeout: 5000,
          type: "error",
        });
      }
    },
  },
  mounted: async function () {
    if (
      ["form-edit-patients", "form-details-patients"].includes(this.$route.name)
    ) {
      this.patient = this.$store.getters.patient.data;
      this.cpfOld = this.patient.cpf;

      if (!this.patient) {
        this.$router.push({ name: "list-patients" });
      }

      this.$emit("patientName", this.patient.name);
    }
  },
};
</script>

<style>
.form-patients {
  height: 85%;
}

.form-patients-divider {
  margin: 30px 0;
}

.form-patients-form {
  color: #0e1958;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}

.form-patients-form-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.form-patients-row {
  display: flex;
  padding: 12px 0;
}

.form-patients-row > * {
  padding: 0 4px;
}

.form-patients-form-name {
  width: 70%;
}

.form-patients-form-cpf {
  width: 15%;
}

.form-patients-form-rg {
  width: 15%;
}

.form-patients-form-birthday {
  width: 20%;
}

.form-patients-form-gender {
  width: 20%;
}

.form-patients-form-cell_phone {
  width: 20%;
}

.form-patients-form-email {
  width: 40%;
}

.form-patients-form-description {
  width: 100%;
}

.form-feedback {
  text-align: right;
}

.form-patients-form-optional {
  font-size: small;
  padding-left: 5px;
  color: #8e9cb0;
}

.form-patients-form-buttons {
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.form-patients-form-submit {
  max-width: fit-content;
}

.form-patients-form-cancel {
  border: none;
  font-weight: bold;
  max-width: fit-content;
}

.form-modal-header {
  text-align: center;
  width: 100%;
}
</style>
