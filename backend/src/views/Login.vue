<template>
  <!--
      This example requires updating your template:
  
      ```
      <html >
      <body >
      ```
    -->
  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">

    <GuestLayout title="Sign in to your account">
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6"  method="POST" @submit.prevent="login">
          <div v-if="errorMsg" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded">
            {{ errorMsg }}
            <span
          @click="errorMsg = ''"
          class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
        >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </span>
            </div>
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900 text-left">Email Address</label>
            <div class="mt-2">
              <input type="email" name="email" id="email" autocomplete="email" required=""
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                placeholder="Email Address" v-model="user.email" />
            </div>
          </div>
          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>

            </div>
            <div class="mt-2">
              <input type="password" name="password" id="password" autocomplete="current-password"
                class="block w-full rounded-md bg-white px-3 py-1.5  text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                v-model="user.password" placeholder="Password" />
            </div>
            <div class="flex justify-between items-center w-full mt-4 mb-4">
            <div class="inline-flex items-center text-indigo-600 font-semibold">
           
              <label class="flex items-center cursor-pointer relative mr-1">
                <input type="checkbox" checked
                  class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-indigo-600 checked:border-indigo-600"
                  id="check6" v-model="user.remember" />
                <span
                  class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                    stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
                  </svg>
                </span>
            
              </label>
              Remember me
            </div>
               <div class="text-sm text-indigo-600 font-semibold hover:text-indigo-500">
                <router-link :to="{name:'requestPassword'}" >Forgot password?</router-link> 
              </div>
          </div>
          
          <div>
            
            <button type="submit" :disabled="loading"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              :class="{'cursor-not-allowed': loading,
                'hover:bg-indigo-500':loading,
              }"
              >
              <svg v-if="loading" class="mt-0.5 mr-3 -ml-1 size-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
              
              Sign
              in</button>
          </div>
        </div>
        </form>
      </div>
    </GuestLayout>
  </div>
</template>


<script setup>
import { ref } from 'vue';
import GuestLayout from '../components/GuestLayout.vue';
// import { useRouter } from 'vue-router';
import store from '../store';
import router from "../router";

let loading = ref(false);
let errorMsg = ref("");

// const router = useRouter();

const user = {
  email: '',
  password: '',
  remember: false
}
function login(){
   loading.value = true; 
   store.dispatch('login',user)
   .then(()=>{
    loading.value = false;
    router.push({name:'app.dashboard'});
   })
   .catch((response)=>{
    loading.value = false;
    console.log(response.data.message);
    errorMsg.value = response.data.message;
   })
}
</script>