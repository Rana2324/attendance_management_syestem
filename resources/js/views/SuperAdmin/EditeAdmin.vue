<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Institution</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Institution</li>
                        <li class="breadcrumb-item">{{ route.params.id }}</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <form @submit.prevent="fromSubmit">
                <div class="form-group">
                    <label for="name">Institution Admin Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        v-model="payload.name"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="email">Institution Admin Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        v-model="payload.email"
                        required
                    />
                </div>

                <div class="form-group">
                    <label>Select Institution</label>
                    <select
                        class="form-control"
                        v-model="payload.institution_id"
                    >
                        <option
                            v-for="institution in institutionData"
                            :key="institution.id"
                            :value="institution.id"
                        >
                            {{ institution.name }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Institution Admin Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        v-model="payload.password"
                        required
                    />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script setup>
import { reactive, onMounted, ref } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useInstitutionAdmin } from "../../composables/institutionAdmin";
import { useInstitutions } from "../../composables/institution";

const institutionData = ref([]);
const { showAdmin, updateAdmin } = useInstitutionAdmin();
const { listInstitutions } = useInstitutions();
const router = useRouter();
const route = useRoute();
const payload = reactive({
    name: "",
    email: "",
    institution_id: "",
    password: "",
});

const fromSubmit = () => {
    updateAdmin(route.params.id, payload)
        .then((response) => {
            router.push({ name: "Admin" });
        })
        .catch((error) => {
            console.log(error);
        });
};
const getInstitution = () => {
    listInstitutions()
        .then((response) => {
            institutionData.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getInstitution();
    showAdmin(route.params.id)
        .then((response) => {
            payload.name = response.data.name;
            payload.email = response.data.email;
            payload.institution_id = response.data.institution_id;
            payload.password = response.data.password;
        })
        .catch((error) => {
            console.log(error);
        });
});
</script>

<style scoped></style>
