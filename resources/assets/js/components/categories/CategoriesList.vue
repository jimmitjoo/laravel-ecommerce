<template>
    <div class="row categories">
        <div class="col-xs-12">
            <h2>Kategorier</h2>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-2" v-for="category in categories">
            <router-link :to="'category/' + category.id">
                <div class="row">
                    <img class="col-xs-12" src="http://placehold.it/400x250/000/fff" alt=""/>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h2>{{ category.name }}</h2>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>

    export default {

        created() {

            axios.get('/api/categories').then(response => {
                this.categories = response.data.data
            });

        },

        data() {

            return {
                categories: [],
                currency: window.Laravel.currencySign,
            }

        }

    }
</script>