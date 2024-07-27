<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <StatCard
                        :count="'150'"
                        :title="'Institutions'"
                        :icon="'fas fa-school'"
                        :variant="'info'"
                    />
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <StatCard
                        :count="'53'"
                        :title="'Teachers'"
                        :icon="'fas fa-chalkboard-teacher'"
                        :variant="'success'"
                    />
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <StatCard
                        :count="'44'"
                        :title="'Students'"
                        :icon="'fas fa-user-graduate'"
                        :variant="'warning'"
                    />
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <StatCard
                        :count="'65'"
                        :title="'Super Admin'"
                        :icon="'fas fa-users-cog'"
                        :variant="'danger'"
                    />
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</template>
<script setup>
import StatCard from "../../components/StatCard.vue";
import { ref } from "vue";
</script>
<style></style>
