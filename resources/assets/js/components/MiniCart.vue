<template>
    <div>
        Varukorg {{ amount }}
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
            }
        },

        methods: {
            getOrderItems() {

                var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                if (order_id) {
                    axios.get('/api/orders/' + order_id + '/items').then((response) => {
                        this.orderItems = response.data.items;

                        this.amount = 0;
                        for (var i = 0; i < this.orderItems.length; i++) {
                            this.amount += this.orderItems[i].amount;
                        }
                    })
                }

            }
        }
    }
</script>