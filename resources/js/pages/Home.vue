

<script setup>
    import axios from "axios";
    import { ref, watch } from "vue";


    // const vorname = ref();
    // const nachname = ref();
    // const email = ref();
    // const tweet_title = ref();
    // const tweet_text = ref();

    const data = ref({
        'vorname':'',
      
        'nachname':'',
       
        'email':'',
     
        'tweet_title':'',
       
        'tweet_text':'',
       
    });

    const errors = ref({
      
        'error_vorname':'',
      
        'error_nachname':'',
     
        'error_email':'',
      
        'error_title':'',
       
        'error_text':''
    });
   
    

    const response = ref();
    const message = ref({'front-end': 'Vue','Data': 'Hallo from Vue.js'});

    const getValue = async () => {
        try {
            response.value = await axios.get("/api/test-me");
        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };

    const sendValue = async() => {
        try {
            let responseLaravel = await axios.post("/api/receive",message.value);
            console.log(responseLaravel.data);

        } catch (error) {
            // Do something with the error
            console.log(error);
        }
    };

    const sendFromData = async()=>{
        try {
            axios.defaults.headers.common['Accept'] = 'application/json';
            axios.defaults.headers.common['Content-Type'] = 'application/json';

            let formData = await axios.post("/api/form",data.value);
            console.log(formData.response.data);

        } catch (error) {
            // Do something with the error
            setTimeout(() => {
                let err =  error.response.data.errors;
            errors.value.error_vorname = err.vorname[0];
      
      errors.value.error_nachname = err.nachname[0];
   
      errors.value.error_email = err.email[0];
    
      errors.value.error_title = err.tweet_title[0];
     
      errors.value.error_text = err.tweet_text[0];
                
            }, 1);
      

            // console.log(error.response.data.errors);
        }
    };


//     watch(errors, async (newErrors, oldQuestion) => {
//         errors.value=newErrors;
//         console.log(errors.value);
// })

setTimeout(() => {
    console.log(errors.value);
}, 5000);

</script>

<template>
    <div>
        <h1>HOME</h1>
        <router-link to="/test">Link zur Test Seite</router-link>
        <button @click.prevent="sendValue">Send Data To BackEnd</button>
        <button @click.prevent="getValue">Get Data from BackEnd</button>
        <p v-if="response">{{ response.data }}</p>
    </div>

    <div>
        <form action="" method="post" @submit.prevent="sendFromData"> 
            <label for="vorname">vorname</label>
            <input type="text" name="vorname" id="vorname" v-model="data.vorname">
            <p>{{ errors.error_vorname  }}</p>
            <label for="nachname">nachname</label>
            <input type="text" name="nachname" id="nachname" v-model="data.nachname">
            <p>{{ errors.error_nachname }}</p>
            <label for="email">email</label>
            <input type="email" name="email" id="email" v-model="data.email">
            <p>{{ errors.error_email }}</p>
            <label for="tweet_title">title</label>
            <input type="text" name="tweet_title" id="tweet_title" v-model="data.tweet_title">
            <p>{{ errors.error_title }}</p>
            <label for="tweet_text">Tweet</label>
            <input type="text" name="tweet_text" id="tweet_text" v-model="data.tweet_text">
            <p>{{ errors.error_text }}</p>
            <button type="submit" >submit</button>
        </form>
    </div>
</template>
