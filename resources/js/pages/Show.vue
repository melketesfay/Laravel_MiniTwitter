<script setup>

import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
import axios, { formToJSON } from "axios";
import { ref, watch, onMounted, computed} from "vue";

import { useRoute } from 'vue-router'

const route = useRoute()


console.log(route.params.id) 




const responseData = ref();

   
const tw = ref()

    const getValue = async () => {
        try {

            
            let response= await axios.get("/api/test-me");
            setTimeout(() => {
          responseData.value = response.data;
          tw.value = responseData.value.filter(e=>e.id == route.params.id )
      }, 1000);


        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };



    const tweetID = ref();

tweetID.value = route.params.id;

console.log(tweetID.value);

    const deleteTweet = async() => {
        

  if (confirm("Are you sure you want to delete this Tweet!")) {
    try {

    let deletedTweet = await axios.delete("/api/delete/"+tweetID.value,{"id":tweetID.value});
            console.log(deletedTweet);
            alert("Deleted")
            window.location.replace("/");
        } catch (error) {
            // Do something with the error
            console.log(error);
        }
  } else {
    
  }




  
    };




 


    onMounted(()=>{

    getValue();
    

})


 

  





  
    

</script>



<template>


<div v-if="tw">



<h1>Single Tweet ID:{{ tw[0].id }}</h1>

    
<Tweet :title="tw[0].tweet_title" :date="tw[0].created_at" :text="tw[0].tweet_text"></Tweet>

<router-link to="/" >Link zur Home Seite</router-link>

<router-link :to="`/edit/${$route.params.id}`"><Button>Edit Tweet</Button></router-link>
<Button @click.prevent="deleteTweet">Delete Tweet</Button>


<button @click.prevent="getValue">GET BACK TweetID</button>
</div>


   
<div v-else>

    <h1>Loading Tweets</h1>
</div> 

    
   


</template>

<style scoped>

</style>