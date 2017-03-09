<template>
    <div class="container-fluid">
        <categories-list></categories-list>
        <hr>
        <latest-products></latest-products>
    </div>
</template>

<script>
    import LatestProducts from './products/LatestProducts.vue';
    import CategoriesList from './categories/CategoriesList.vue';

    export default {

        components: {
            CategoriesList,
            LatestProducts,
        }

    }
</script>