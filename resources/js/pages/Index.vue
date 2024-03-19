<script setup> 
import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
    import axios from "axios";
    import { ref, watch,onMounted } from "vue";


    const responseData = ref();


    const getValue = async () => {
        try {
            let response= await axios.get("/api/test-me");

            responseData.value = response.data;

      


        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };


 

    getValue();
  
  

</script>


<template>
    <div>
        <h1>All Tweets</h1>
        <button @click.prevent="getValue">GET</button>
        <router-link to="/create" >Link zur Home Seite</router-link>
    

            <div v-for="tweet in responseData">
            <Tweet :title="tweet.tweet_title" :date="tweet.created_at" :text="tweet.tweet_text"></Tweet>
            <router-link :to="`/tweet/${tweet.id}`">
            
<Button>Tweet ansehen</Button>
</router-link>
        
        </div>
        


      
       

  
    </div>
</template>