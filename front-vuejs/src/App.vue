<script setup lang="ts"></script>

<template>
  <div id="app">
    <div class="left-block"></div>
    <div class="content">
      <div class="top-block"></div>
      <div class="router-view">
        <router-view />
      </div>
    </div>
  </div>
</template>

<style>
.left-block {
  background-color: #0e1958;
  width: 6%;
  min-height: 100vh;
}

.content {
  min-width: 94%;
  min-height: 100%;
}

.top-block {
  height: 8.5%;
  background-color: white;
  border-bottom: 1px solid #d9def1;
}

.router-view {
  background-color: #f4f5fb;
  min-width: 94%;
  min-height: 91.5%;
}
</style>
