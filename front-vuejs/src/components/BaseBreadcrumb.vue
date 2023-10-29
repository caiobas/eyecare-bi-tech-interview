<template>
  <b-breadcrumb
    class="breadcrumb"
    v-if="items.length"
    style="--cui-breadcrumb-divider: '>'"
    :items="items"
  ></b-breadcrumb>
</template>

<script>
export default {
  name: "BaseBreadcrumb",
  props: {
    items: Array,
  },
};
</script>

<style>
.breadcrumb > * {
  --bs-breadcrumb-divider: ">";
}

a {
  text-decoration: none;
}
</style>
