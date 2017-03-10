import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        order: {},
    },
    getters: {

    },
    mutations: {
        setOrder: state => {
            axios.get('/api/orders/' + order_id + '/items').then(response => {

                state.order = response.data;

                /*this.orderItems = response.data.items;

                this.amount = 0;
                this.sum = 0;
                for (var i = 0; i < this.orderItems.length; i++) {
                    this.amount += this.orderItems[i].amount;
                    this.sum += (parseFloat(this.orderItems[i].product.price) * this.orderItems[i].amount);
                }*/
            });
        }
    }
})