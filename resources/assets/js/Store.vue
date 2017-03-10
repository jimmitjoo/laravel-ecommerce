<template>
    <div>
        <navigation></navigation>
        <!--<transition name="fade" mode="out-in">-->
            <router-view></router-view>
        <!--</transition>-->
        <footer></footer>
    </div>
</template>

<script>
    import Navigation from './components/Navigation.vue';
    export default {

        mounted() {
            this.getOrder();
        },

        methods: {
            getOrder() {
                var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                axios.get('/api/orders/' + order_id + '/items').then(response => {
                    this.$store.order = response.data;

                    console.log(this.$store.order.items);
                });
            }
        },

        components: {
            Navigation
        }
    }
</script>

<style>

    .fade-enter {
        opacity: 1;
    }
    .fade-enter-active {
        animation: fade-in .5s ease-out forwards;
        transition: opacity .25s;

    }
    .fade-leave {
    }
    .fade-leave-active {
        animation: fade-out .5s ease-out forwards;
        transition: opacity .5s;
        opacity: 0;
    }
    
    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fade-out {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
    
</style>