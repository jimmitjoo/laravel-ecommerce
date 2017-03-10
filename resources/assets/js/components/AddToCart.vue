<template>
    <div>
        <form v-on:submit.prevent="addToCart()">
            <div class="input-group">
                <input class="form-control" type="number" v-model="product.amount" min="0">
                <span class="input-group-btn">
                    <button class="btn btn-success">Köp nu</button>
                </span>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'productId',
            'productAmount'
        ],

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
                    product_id: this.productId,
                    amount: this.product.amount
                }).then(response => {

                    console.log(response.data);

                    Event.$emit('updated_cart', true);

                    localStorage.order_id = response.data.order_id;
                }).catch(error => {
                    console.log(error)
                });
            }
        }
    }
</script>