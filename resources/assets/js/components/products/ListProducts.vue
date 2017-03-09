<template>
    <div>
        <div class="col-xs-6 col-md-3 col-lg-2" v-for="product in products">
            <router-link :to="'/product/' + product.id">
                <div class="row">
                    <img class="col-xs-12" src="http://placehold.it/400x250/000/fff" alt=""/>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h2>{{ product.name }}</h2>
                    </div>
                    <div class="col-xs-12">
                        <span>{{ product.price + ' ' + currency }}</span>
                    </div>
                </div>
            </router-link>
            <div class="row">
                <div class="col-xs-12">
                    <add-to-cart :productId="product.id" product-amount="1"></add-to-cart>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AddToCart from './../AddToCart.vue';

    export default {
        props: ['products'],

        data() {
            return {
                currency: window.Laravel.currencySign,
            }
        },

        components: {
            AddToCart,
        }
    }
</script>