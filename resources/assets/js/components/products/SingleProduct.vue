<template>
    <div class="container-fluid">
        <div class="row single-product">
            <div class="col-xs-12 col-sm-4">
                <div class="row">
                    <img class="col-xs-12" src="http://placehold.it/600x600/000/fff" alt=""/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5">
                <h1>{{ product.name }}</h1>

                <div v-html="product.description"></div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div v-html="product.price + ' ' + currency"></div>

                <add-to-cart :productId="product.id" product-amount="1"></add-to-cart>
            </div>
        </div>
    </div>
</template>

<script>
    import AddToCart from './../AddToCart.vue';

    export default {

        created() {

            this.getProduct();

        },

        data() {
            return {
                id: this.$route.params.id,

                currency: window.Laravel.currencySign,

                product: {}
            }
        },

        methods: {

            getProduct() {
                axios.get('/api/product/' + this.$route.params.id).then(response => {
                    this.product = response.data;
                });
            }

        },

        watch: {
            '$route'(to, from) {
                this.id = to.params.id;

                this.getProduct();
            }
        },

        components: {
            AddToCart
        }
    }
</script>