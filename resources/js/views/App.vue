<template>
    <div>
        <Header />
        <Main />
        <router-view></router-view>
        <Footer />
    </div>

</template>

<script>
import Main from '../components/Main.vue';
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
export default {
    name: "App",
        components: {
            Header,
            Main,
            Footer,
        }
}
</script>

<style lang="scss">
</style>