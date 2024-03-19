<script setup>

</script>


<template>


<button class="main-btn btn-color" >
  <slot></slot> 
</button>


</template>

<style scoped>

.main-btn{
    padding: 1rem 1.5rem;
    background-color: black;
    color: white;
    border-radius: 0.5rem;
}

</style>