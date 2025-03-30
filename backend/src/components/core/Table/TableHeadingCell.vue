<template>
<th @click="$emit('click')" class="border-b-2 p-2 text-left cursor-pointer bg-gray-100"
:class="field === sortField ? 'bg-blue-50' : ''"
>
    <div class="flex justify-between">
        <slot></slot>
        <div v-if="sortField === field" class="ml-2">
            
        </div>
    </div>
</th>
</template>
<script setup>

</script>