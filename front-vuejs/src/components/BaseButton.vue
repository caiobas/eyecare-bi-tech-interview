<template>
  <b-button :variant="this.variant" :to="this.to">
    <slot></slot>
  </b-button>
</template>

<script>
export default {
  name: "BaseButton",
  props: {
    variant: String,
    colSize: String,
    to: Object,
  },
};
</script>

<style></style>
