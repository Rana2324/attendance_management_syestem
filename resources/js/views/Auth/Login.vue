<template>
    <div
        class="d-flex justify-content-center align-items-center"
        style="height: 100vh; width: 100vw"
    >
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <!-- Display Error Message -->
                    <div v-if="errorMessage" class="alert alert-danger">
                        {{ errorMessage }}
                    </div>

                    <!-- Display Success Message -->
                    <div v-if="successMessage" class="alert alert-success">
                        {{ successMessage }}
                    </div>
                    <form @submit.prevent="formSubmit">
                        <div class="input-group mb-3">
                            <input
                                v-model="payload.email"
                                type="email"
                                class="form-control"
                                placeholder="Email"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                v-model="payload.password"
                                type="password"
                                class="form-control"
                                placeholder="Password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" />
                                    <label for="remember"> Remember Me </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Sign In
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using
                            Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in
                            using Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center"
                            >Register a new membership</a
                        >
                    </p>
                </div>
            </div>
            <!-- /.login-box -->
        </div>
    </div>
</template>
<script setup>
import { useAuth } from "../../composables/auth";
import { useRouter } from "vue-router";
import { ref, reactive } from "vue";
import { useSwal } from "../../composables/swal";

// Define reactive form fields
const { login } = useAuth();
const payload = reactive({
    email: "",
    password: "",
});

const errorMessage = ref("");
const successMessage = ref("");
const router = useRouter();
const formSubmit = () => {
    login(payload)
        .then((response) => {
            useSwal().fire("success", "Login successfull");
            if (response.data.role.name === "SUPER_ADMIN") {
                router.push({ name: "SuperAdmin" });
            }
        })
        .catch((error) => {
            useSwal().fire("error", "Login failed");
            console.log(error);
        });
};
</script>

<style scoped></style>
