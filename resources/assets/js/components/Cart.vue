<template>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Antal</th>
                        <th>Pris á styck</th>
                        <th>Pris á styck</th>
                    </tr>
                    </thead>
                    <tr v-for="item in items">
                        <td>
                            <router-link :to="{ name: 'single-product', params: { id: item.product_id } }">name</router-link>
                        </td>
                        <td>{{ item.amount }} st</td>
                        <td></td>
                        <td>
                            <button @click="removeItem(item.id)">Remove</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <apply-coupon></apply-coupon>
            </div>
        </div>
    </div>
</template>

<script>
    import ApplyCoupon from './coupons/ApplyCoupon.vue';

    export default {

        data() {
            return {
                items: this.$store.order.items
            }
        },

        methods: {
            getOrderItems() {

                /*var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                if (order_id) {
                    axios.get('/api/orders/' + order_id + '/items').then(response => {
                        this.orderItems = response.data.items;

                        this.amount = 0;
                        this.sum = 0;
                        for (var i = 0; i < this.orderItems.length; i++) {
                            this.amount += this.orderItems[i].amount;
                            this.sum += (parseFloat(this.orderItems[i].product.price) * this.orderItems[i].amount);
                        }
                    });
                }*/

            },

            removeItem(id) {

                var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                if (order_id) {
                    console.log('/api/orders/' + order_id + '/items/' + id + '/delete');

                    axios.post('/api/orders/' + order_id + '/items/' + id + '/delete').then(response => {

                        Event.$emit('updated_cart', true);

                    });
                }
            }
        },

        components: {
            ApplyCoupon
        }
    }
</script>