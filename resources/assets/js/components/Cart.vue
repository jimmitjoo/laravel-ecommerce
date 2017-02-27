<template>
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
            <tr v-for="item in orderItems">
                <td><a href="#">{{ item.product.name }}</a></td>
                <td>{{ item.amount }} st</td>
                <td>{{ item.product.price }}</td>
                <td>
                    <button @click="removeItem(item.id)">Remove</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {

        mounted() {
            Event.$on('added_to_cart', () => {
                this.getOrderItems();
            });

            this.getOrderItems();
        },

        data() {
            return {
                orderItems: [],
                amount: 0,
                sum: 0.0,
            }
        },

        methods: {
            getOrderItems() {

                var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                if (order_id) {
                    axios.get('/api/orders/' + order_id + '/items').then((response) => {
                        this.orderItems = response.data.items;

                        this.amount = 0;
                        this.sum = 0;
                        for (var i = 0; i < this.orderItems.length; i++) {
                            this.amount += this.orderItems[i].amount;
                            this.sum += (parseFloat(this.orderItems[i].product.price) * this.orderItems[i].amount);
                        }
                    })
                }

            },

            removeItem(id) {

                var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                if (order_id) {
                    axios.post('/api/orders/' + order_id + '/items/' + id + '/remove').then(response => {

                        // delete item id from order

                    });
                }
            }
        }
    }
</script>