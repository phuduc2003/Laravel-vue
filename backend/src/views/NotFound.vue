<template>
    <div class="flex justify-center items-center min-h-full w-full min-w-full">
<div class="flex">
    <div class="text-indigo-600  text-5xl px-8 font-bold  pb-8 leading-11 ">
        404
    </div>
    <div class="border-r h-20"></div>
    <div class="px-8">
        <h1 class="text-5xl font-bold mb-3">Page not found</h1>
        <p class="text-gray-400 mb-8">Please check the url in address bar and try again</p>

        <div>
            <router-link :to="{name:'app.dashboard'}">
            <button class="py-2 px-4 justify-center rounded-md bg-indigo-600 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</button>
        </router-link>
        </div>
 
    </div>
</div>
</div>
</template>