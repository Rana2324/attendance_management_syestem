<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Institution Admin</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Institution</li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <form @submit.prevent="fromSubmit()">
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

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
</template>

<script setup>
import { reactive, ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { useInstitutionAdmin } from "../../composables/institutionAdmin";
import { useInstitutions } from "../../composables/institution";
import { useSwal } from "../../composables/swal";

const { storeAdmin } = useInstitutionAdmin();
const { listInstitutions } = useInstitutions();
const institutionData = ref([]);
const router = useRouter();
const payload = reactive({
    name: "",
    email: "",
    institution_id: "",
});

const fromSubmit = () => {
    storeAdmin(payload)
        .then((response) => {
            useSwal().fire("success", "Institution Admin created successfully");
            router.push({ name: "Admin" });
        })
        .catch((error) => {
            useSwal().fire("error", "Institution Admin created failed");
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
});
</script>

<style scoped></style>
