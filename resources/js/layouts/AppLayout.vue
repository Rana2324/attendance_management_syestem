<template>
    <Header v-if="!isLoginPath" />

    <SideBar v-if="!isLoginPath" />

    <div id="content-wrapper" class="content-wrapper">
        <router-view />
    </div>

    <Footer v-if="!isLoginPath" />
</template>
<script setup>
import { useRoute } from "vue-router";
import { watch, ref } from "vue";
import Header from "../components/Header.vue";
import SideBar from "../components/SideBar.vue";
import Footer from "../components/Footer.vue";

const isLoginPath = ref(false);
const route = useRoute();

watch(
    () => route.name,
    (newValue) => {
        if (newValue === "Login") {
            isLoginPath.value = true;
            let bodyElement = document.getElementById("body");
            bodyElement.classList.remove("sidebar-mini");
            bodyElement.classList.add("login-page");

            document.getElementById("app").classList.remove("wrapper");
            document
                .getElementById("content-wrapper")
                .classList.remove("content-wrapper");
        } else {
            isLoginPath.value = false;
            let bodyElement = document.getElementById("body");
            bodyElement.classList.contains("login-page")
                ? bodyElement.classList.remove("login-page")
                : "";
            bodyElement.classList.contains("sidebar-mini")
                ? ""
                : bodyElement.classList.add("sidebar-mini");

            document.getElementById("app").classList.contains("wrapper")
                ? ""
                : document.getElementById("app").classList.add("wrapper");
            document
                .getElementById("content-wrapper")
                .classList.contains("content-wrapper")
                ? ""
                : document
                      .getElementById("content-wrapper")
                      .classList.add("content-wrapper");
        }
    },
);
</script>
<style></style>
