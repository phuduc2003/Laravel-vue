<template>
    <div class="flex min-h-screen bg-gray-200">
      <Sidebar :class="{'-ml-[200px]': !sidebarOpened}"></Sidebar>
        <div class="flex-1">
           <Navbar @toggle-sidebar="toggleSidebar"/>
            <main class="p-6">
              
                    <router-view></router-view>
                
             
            </main>
        </div>
    </div>
</template>
<script setup>
import { ref,onMounted,onUnmounted } from 'vue';
import Sidebar from './sidebar.vue';

import Navbar from './Navbar.vue';


function toggleSidebar(){
    sidebarOpened.value = !sidebarOpened.value;
    
}


const sidebarOpened = ref(true);

onMounted(()=>{
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