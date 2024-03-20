<script setup>
import axios from "axios";
import { onMounted, ref } from 'vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import { TailwindPagination } from 'laravel-vue-pagination';

const laravelData = ref({});
/* 




import { ref } from 'vue';
import { TailwindPagination } from 'laravel-vue-pagination';

const laravelData = ref({});

const getResults = async (page = 1) => {
    const response = await fetch(`https://example.com/results?page=${page}`);
    laravelData.value = await response.json();
}

getResults();




*/


const fetchData = async (page = 1) => {


    let res = await axios.get(`/api/pages?page=${page}`);



    laravelData.value = await res;
    console.log(laravelData.value)
}

// onMounted(() => {
//     fetchData()
// })

</script>

<template>

    <div v-if="laravelData.data">
        <div>
            <ul>
                <li v-for="post in laravelData.data.data" :key="post.id">{{ post.tweet_title }}</li>
            </ul>

            <TailwindPagination :data="laravelData" @pagination-change-page="fetchData" />
        </div>



    </div>

    <div v-else>
        <h1>No Data Found</h1>
        <button @click.prevent="fetchData">Fetch</button>
    </div>


</template>


<style scoped></style>