<template>
    <!--
      This example requires updating your template:
  
      ```
      <html >
      <body >
      ```
    -->
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
      <GuestLayout title="Request new password">
  
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900 text-left">Email Address</label>
            <div class="mt-2">
              <input type="email" name="email" id="email" autocomplete="email" required="" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Email Address" />
            </div>
          </div>
  
          <div>
            <div class="flex items-center justify-between">
              <div class="text-sm">
                <router-link :to="{name:'login'}" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</router-link> 
              </div>
            </div>
          </div>
  
          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
          </div>
        </form>
  
       
      </div>
      </GuestLayout>
    </div>
  </template>
    <script setup>
    import GuestLayout from '../components/GuestLayout.vue';
   
  </script>