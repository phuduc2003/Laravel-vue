<template>
    <div v-if="currentUser.id" class="flex min-h-screen bg-gray-200">
       
      <Sidebar :class="{'-ml-[200px]': !sidebarOpened}"></Sidebar>
        <div class="flex-1">
           <Navbar @toggle-sidebar="toggleSidebar"/>
            <main class="p-6">
              
                    <router-view></router-view>
                
             
            </main>
        </div>
    </div>
    <div v-else class="min-h-full bg-gray-200 flex items-center justify-center">
           <Spinner></Spinner>
        </div>
</template>
<script setup>
import { ref,onMounted,onUnmounted, computed } from 'vue';
import Sidebar from './sidebar.vue';

import Navbar from './Navbar.vue';
import store from '../store';
import Spinner from './core/Spinner.vue';


function toggleSidebar(){
    sidebarOpened.value = !sidebarOpened.value;
    
}

const currentUser = computed(()=>store.state.user.data);
const sidebarOpened = ref(true);

onMounted(()=>{
    store.dispatch('getUser')
    handleSidebarOpened()
    window.addEventListener('resize',handleSidebarOpened);
})
onUnmounted(()=>{
    window.removeEventListener('resize', handleSidebarOpened)
})
function handleSidebarOpened(){
    if(window.outerWidth <= 768){
         sidebarOpened.value = false
    }else{
        sidebarOpened.value = true
    } 
}
</script>