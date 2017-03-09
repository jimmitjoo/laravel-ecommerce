<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1>{{ category.name }}</h1>
            </div>
        </div>
        <div class="row category-products">
            <list-products :products="category.products"></list-products>
        </div>
    </div>
</template>

<script>
    import AddToCart from './../AddToCart.vue';
    import ListProducts from './../products/ListProducts.vue';

    export default {

        created() {

            axios.get('/api/category/' + this.$route.params.id).then(response => {
                this.category = response.data;
            });

        },

        data() {
            return {
                id: this.$route.params.id,

                currency: window.Laravel.currencySign,

                category: {}
            }
        },

        watch: {
            '$route'(to, from) {
                this.id = to.params.id
            }
        },

        components: {
            AddToCart,
            ListProducts
        }
    }
</script>

<style>
    .category-products h2 {
        text-overflow: ellipsis;
        font-weight: bold;
        max-width: 100%;
        font-size: 1em;
    }
</style>