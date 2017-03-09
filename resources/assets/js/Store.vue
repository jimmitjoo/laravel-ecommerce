<template>
    <div>
        <navigation></navigation>
        <router-view></router-view>
        <footer></footer>
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