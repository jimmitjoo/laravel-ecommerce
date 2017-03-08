<template>
    <div>
        <navigation></navigation>
        <router-view></router-view>
        <h2>Footer</h2>
    </div>
</template>

<script>
    import Navigation from './components/Navigation.vue';
    export default {

        components: {
            Navigation
        }
    }
</script>

<style>

</style>