<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Product</h1>
        <button type="submit"
        @click="showProductModal"
            class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 ">
            Add new Product
        </button>
    </div>
    <ProductModal v-model="showModal" :product="productModel" @close="onModalClose"/>
    <ProductTable @clickEdit="editProduct"/>
</template>
<script setup>
 import { ref } from 'vue';
import ProductModal from './ProductModal.vue';
import ProductTable from './ProductTable.vue';
import store from '../../store';

const DEFAULT_EMPTY_OBJECT ={
    id:'',
    title:'',
    image:'',
    description:'',
    price:''
}

const productModel = ref({...DEFAULT_EMPTY_OBJECT})
const showModal = ref(false)
function showProductModal() {
    showModal.value = true
}
function editProduct(product){
   store.dispatch('getProduct',product.id)
   .then(({data}) => {
    productModel.value = data
    showProductModal()
   })
}
function onModalClose(){
   productModel.value = {...DEFAULT_EMPTY_OBJECT}
}
</script>