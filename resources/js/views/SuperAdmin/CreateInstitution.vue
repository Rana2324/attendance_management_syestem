<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Institution</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Institution</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <form @submit.prevent="fromSubmit()">
                <div class="form-group">
                    <label for="name">Institution Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        v-model="payload.institutionName"
                        required
                    />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
</template>

<script setup>
import { reactive } from "vue";
import { useRouter } from "vue-router";
import { useInstitutions } from "../../composables/institution";
import { useSwal } from "../../composables/swal";

const { storeInstitution } = useInstitutions();

const router = useRouter();
const payload = reactive({
    institutionName: "",
});

const fromSubmit = () => {
    storeInstitution(payload)
        .then((response) => {
            useSwal().fire("success", "Institution created successfully");
            router.push({ name: "Institution" });
        })
        .catch((error) => {
            useSwal().fire("error", "Failed to create Institution");
            console.log(error);
        });
};
</script>

<style scoped></style>
