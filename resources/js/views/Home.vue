<template>
    <div>
        <h1>{{ message }}</h1>
    </div>
</template>

<script setup>
import { ref } from "vue";

const message = ref("Home");
</script>
