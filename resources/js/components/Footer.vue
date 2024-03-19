<script setup>

</script>

<template>

<div class="footer">
    <div class="lef">
        <p>Mini-Twitter Built with Laravel and Vue</p>
    </div>
    <div class="right">
        <p>&copy;Melke Tesfay</p>

    </div>
</div>

</template>


<style scoped>

.footer{
    display: flex;
    justify-content: space-between;
    position: fixed;
    bottom: 0px;
    width: 100%;
    padding:0 1rem;
    background-color: white;
}
@media screen and (max-width: 600px) {
  .footer {
font-size: 1rem;  }
}

</style>