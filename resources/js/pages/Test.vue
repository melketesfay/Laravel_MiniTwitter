<script setup>

import { onMounted, ref } from 'vue';


    // const getValue = async () => {
    //     try {

            
    //         let response= await axios.get("/api/test-me");
    //         setTimeout(() => {
    //       responseData.value = response.data;
    //       tw.value = responseData.value.filter(e=>e.id == route.params.id )
    //   }, 1000);


    //     } catch (error) {
    //         // Do something with the error
    //         console.log(error);
    //     }
    // };


const fetchData = async()=>{

    try {
        let data = await fetch("/api/test-me")
  .then((response) => response.json())
  .then((data) => console.log(data));
    } catch (error) {
        console.log(error);
    }

}

onMounted(()=>{
    fetchData()
})

</script>


<template>


<h1>Test Page</h1>
</template>

<style scoped></style>