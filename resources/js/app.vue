<template>
    <Header />

    <SideBar />

    <div class="content-wrapper">
        <router-view></router-view>
    </div>

    <Footer />
</template>
<script setup>
import Header from "./components/Header.vue";
import SideBar from "./components/SideBar.vue";
import Footer from "./components/Footer.vue";
</script>
<style></style>
