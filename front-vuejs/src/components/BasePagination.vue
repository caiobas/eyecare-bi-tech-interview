<template>
  <b-pagination
    v-model="currentPage"
    :total-rows="totalRows"
    :per-page="perPage"
    first-number
    last-number
  ></b-pagination>
</template>

<script>
export default {
  name: "BasePagination",
  props: {
    currentPage: Number,
    totalRows: Number,
    perPage: Number,
  },
};
</script>

<style></style>
