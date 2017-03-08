<template>
    <div>
        <ul>
            <li v-for="product in products">
                <router-link :to="'product/' + product.id" >{{ product.name }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        created() {

            axios.get('/api/products/latest').then(response => {
                this.products = response.data.data
            });

        },

        data() {

            return {
                products: []
            }

        }

    }
</script>