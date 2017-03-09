<template>
    <div>
        <div class="row">
            <div class="col-xs-12">
                <h2>Senaste produkter</h2>
            </div>
        </div>
        <div class="row latest-products">
            <list-products :products="products"></list-products>
        </div>
    </div>
</template>

<script>
    import ListProducts from './ListProducts.vue';

    export default {

        created() {

            axios.get('/api/products/latest').then(response => {
                this.products = response.data.data
            });

        },

        data() {

            return {
                products: [],
            }

        },

        components: {
            ListProducts
        }

    }
</script>

<style>
    .latest-products h2 {
        text-overflow: ellipsis;
        font-weight: bold;
        max-width: 100%;
        font-size: 1em;
    }
</style>