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
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div
                    class="col-lg-3 col-6"
                    v-for="(value, key) in stats"
                    :key="key"
                >
                    <!-- small box -->
                    <StatCard
                        :count="value.count"
                        :title="value.title"
                        :icon="value.icon"
                        :variant="value.variant"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from "vue";
import axios from "axios";
import StatCard from "../../components/StatCard.vue";

// Reactive data
const stats = reactive({
    institutions: {
        title: "Institutions",
        count: 0,
        icon: "fas fa-school",
        variant: "info",
    },
    teachers: {
        title: "Teachers",
        count: 0,
        icon: "fas fa-chalkboard-teacher",
        variant: "success",
    },
    students: {
        title: "Students",
        count: 0,
        icon: "fas fa-user-graduate",
        variant: "warning",
    },
    superAdmin: {
        title: "Super Admin",
        count: 0,
        icon: "fas fa-users-cog",
        variant: "danger",
    },
});

// Fetch data from API
const fetchStats = async () => {
    try {
        const response = await axios.get("/api/dashboard-count");
        if (response.data.data && typeof response.data.data === "object") {
            stats.institutions.count = response.data.data.institutions;
            stats.teachers.count = response.data.data.teachers;
            stats.students.count = response.data.data.students;
            stats.superAdmin.count = response.data.data.super_admins;
        } else {
            console.error("Invalid API response format:", response.data);
        }
    } catch (error) {
        console.error("Failed to fetch stats:", error);
    }
};

// Fetch data when the component is mounted
onMounted(fetchStats);
</script>
