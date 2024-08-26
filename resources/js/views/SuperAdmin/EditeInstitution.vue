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

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script setup>
import { reactive, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useInstitutions } from "../../composables/institution";
import { useSwal } from "../../composables/swal";

const { showInstitution, updateInstitution } = useInstitutions();
const router = useRouter();
const route = useRoute();
const payload = reactive({
    institutionName: "",
});

const fromSubmit = () => {
    updateInstitution(route.params.id, payload)
        .then((response) => {
            useSwal().fire("success", "Institution update successfully");
            router.push({ name: "Institution" });
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    showInstitution(route.params.id)
        .then((response) => {
            payload.institutionName = response.data.name;
        })
        .catch((error) => {
            console.log(error);
        });
});
</script>

<style scoped></style>
