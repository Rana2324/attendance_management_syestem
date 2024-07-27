<template>
    <!-- small box -->
    <div class="small-box" :class="`bg-${variant}`">
        <div class="inner">
            <h3>{{ count }}</h3>

            <p>{{ title }}</p>
        </div>
        <div class="icon">
            <!-- <i class="fas fa-university"></i> -->
            <i :class="icon"></i>
        </div>
    </div>
</template>
<script setup>
const props = defineProps(["count", "title", "icon", "variant"]);
</script>
<style></style>
