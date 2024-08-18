<template>
    <!-- small box -->
    <div class="small-box" :class="`bg-${variant}`">
        <div class="inner">
            <h3>{{ count }}</h3>
            <p>{{ title }}</p>
        </div>
        <div class="icon">
            <i :class="icon"></i>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    count: Number,
    title: String,
    icon: String,
    variant: String,
});
</script>

<style scoped></style>
