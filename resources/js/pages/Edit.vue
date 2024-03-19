
<script setup>
import Tweet from '../components/Tweet.vue';
import Button from '../components/Button.vue';
import axios, { formToJSON } from "axios";
import { ref, watch, onMounted, computed} from "vue";

import { useRoute } from 'vue-router'

const route = useRoute()





const tweetID = ref();

tweetID.value = route.params.id;

console.log(tweetID.value);



    const responseData = ref();
    const tw = ref();
    const data = ref({
     
     
        'tweet_title':'',
       
        'tweet_text':''
       
    });

    const getValue = async () => {
        try {

            
            let response= await axios.get("/api/test-me");
            setTimeout(() => {
          responseData.value = response.data;
          tw.value = responseData.value.filter(e=>e.id == route.params.id )
          data.value.tweet_title = tw.value[0].tweet_title;
          data.value.tweet_text = tw.value[0].tweet_text;
      }, 1000);


        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };

    const editTweet = async() => {
        try {
            let deletedTweet = await axios.put("/api/edit/"+tweetID.value,data.value);
            console.log(deletedTweet);

        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };
    


onMounted(()=>{
getValue();
})
</script>


<template>
    <div>
        <h1>Edit Tweet with ID: {{ $route.params.id }}</h1>

        <form action="" method="post">
            <div class="input_group">
                <label for="tweet_title">title</label>
                <input class="title" type="text" name="tweet_title" id="tweet_title" v-model="data.tweet_title">
            </div>

            <div class="input_group">

                <label for="tweet_text">tweet</label>
                <textarea class="tweet" type="text-" name="tweet_title" id="tweet_title" v-model="data.tweet_text">
                </textarea>
            </div>
            <button type="submit" @click.prevent="editTweet">Edit</button>
        </form>

        <router-link to="/" >Link zur Home Seite</router-link>
    </div>
</template>

<style scoped>

form{
display: flex;
flex-direction: column;
gap: 2rem;
max-width: 50%;
}

.input_group{
    display: flex;
    flex-direction: column;
}

.tweet{
    min-height: 200px;
}
</style>