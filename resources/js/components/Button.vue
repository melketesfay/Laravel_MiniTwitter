<script setup>

</script>


<template>


  <button class="main-btn btn-color">
    <slot></slot>
  </button>


</template>

<style scoped>
.main-btn {
  padding: 1rem 1.5rem;
  background-color: black;
  color: white;
  border: none;
  border-radius: 0.7rem;
  font-size: 1.4rem;
}
</style>