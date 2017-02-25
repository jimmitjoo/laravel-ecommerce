<template>
    <div>
        <form v-on:submit.prevent="addToCart()">
            <input type="number" v-model="product.amount" min="0">
            <button class="btn btn-success">Köp nu</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'productId',
            'productAmount'
        ],

        mounted() {
            console.log('mounted')
        },

        data() {
            return {
                product: {
                    id: parseInt(this.productId),
                    amount: parseInt(this.productAmount)
                }
            }
        },

        methods: {
            addToCart() {

                var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                axios.post('/api/addtocart', {
                    order_id: order_id,
                    product_id: this.product.id,
                    amount: this.product.amount
                }).then(response => {

                    Event.$emit('added_to_cart', true);

                    localStorage.order_id = response.data.order_id;
                }).
                catch(error => {
                    console.log(error)
                });
            }
        }
    }
</script>