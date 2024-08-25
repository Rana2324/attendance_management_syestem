<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Institution Admin</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            Institution Admin
                        </li>
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
                    @click="gotoCreateInstitutionAdmin()"
                    class="btn bg-gradient-primary my-2 mb-4"
                >
                    Add Institution Admin
                </button>
            </div>
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Institutions Admin</h3>

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
                                    <th>Admin Name</th>
                                    <th>Instation Name</th>
                                    <th>Email</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="item in institutionAdmin"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.institution.name }}</td>
                                    <td>{{ item.email }}</td>
                                    <td>{{ item.created_at }}</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-primary mr-3"
                                            @click="
                                                gotoEditInstitutionAdmin(
                                                    item.id
                                                )
                                            "
                                        >
                                            Edit
                                        </button>
                                        <button
                                            class="btn btn-sm btn-danger"
                                            @click="
                                                deleteInstitutionAdmin(item.id)
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
import { useInstitutionAdmin } from "../../composables/institutionAdmin";
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";

const { adminList, deleteAdmin } = useInstitutionAdmin();
const institutionAdmin = ref([]);
const router = useRouter();
const gotoCreateInstitutionAdmin = () => {
    router.push({ name: "createAdmin" });
};
const gotoEditInstitutionAdmin = (id) => {
    router.push({ name: "editeAdmin", params: { id } });
};
const deleteInstitutionAdmin = (id) => {
    if (confirm("Are you sure you want to delete this institution Admin?")) {
        deleteAdmin(id)
            .then(() => {
                getInstitutionAdmin();
            })
            .catch((error) => {
                console.log(error);
            });
    }
};

const getInstitutionAdmin = () => {
    adminList()
        .then((response) => {
            institutionAdmin.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getInstitutionAdmin();
});
</script>
<style></style>
