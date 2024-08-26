<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Institution</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Institution</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="row mx-2">
            <div class="col-12 text-right">
                <button
                    @click="gotoCreateInstitution()"
                    class="btn bg-gradient-primary my-2 mb-4"
                >
                    Add Institution
                </button>
            </div>
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Institutions</h3>

                        <div class="card-tools">
                            <div
                                class="input-group input-group-sm"
                                style="width: 150px"
                            >
                                <input
                                    type="text"
                                    name="table_search"
                                    class="form-control float-right"
                                    placeholder="Search"
                                />

                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-default"
                                    >
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Instation Name</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="institution in institutions"
                                    :key="institution.id"
                                >
                                    <td>{{ institution.id }}</td>
                                    <td>{{ institution.name }}</td>
                                    <td>{{ institution.created_at }}</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-primary mr-3"
                                            @click="
                                                gotoEditInstitution(
                                                    institution.id
                                                )
                                            "
                                        >
                                            Edit
                                        </button>
                                        <button
                                            class="btn btn-sm btn-danger"
                                            @click="
                                                deleteInstitutionHandler(
                                                    institution.id
                                                )
                                            "
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</template>
<script setup>
import { useInstitutions } from "../../composables/institution";
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import { useSwal } from "../../composables/swal";

const { listInstitutions, deleteInstitution } = useInstitutions();

const institutions = ref([]);
const router = useRouter();

const gotoCreateInstitution = () => {
    router.push({ name: "createInstitution" });
};
const gotoEditInstitution = (id) => {
    router.push({ name: "editInstitution", params: { id } });
};
const deleteInstitutionHandler = (id) => {
    if (confirm("Are you sure you want to delete this institution?")) {
        deleteInstitution(id)
            .then((response) => {
                useSwal().fire("success", "Institution delete successfully");
                getInstitution();
            })
            .catch((error) => {
                useSwal().fire("error", "Institution delete failed");
                console.log(error);
            });
    }
};
const getInstitution = () => {
    listInstitutions()
        .then((response) => {
            institutions.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getInstitution();
});
</script>
<style></style>
