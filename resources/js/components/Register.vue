<template>
    <div class="container" style="padding-top:1rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        REGISTER USER
                    </div>
                    <div class="card-body">

                        <form method="POST" action="/register" @submit.prevent="onSubmit">

                            <!-- CSRF -->
                            <input type="hidden" name="_token" :value="csrf">

                            <!-- NAME -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-4">
                                    <input v-model="name" id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <!-- EMAIL -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-4">
                                    <input v-model="email" id="email" type="email" class="form-control" name="email" value="" required autocomplete="email">
                                </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password (8 Characters min)</label>
                                <div class="col-md-4">
                                    <input v-model="password" id="password" type="password" class="form-control" name="password" value="" required autocomplete="password">
                                </div>
                            </div>

                            <!-- PASSWORD CONFIRM -->
                            <div class="form-group row">
                                <label for="password-confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="password_confirmation">
                                </div>
                            </div>

                            <!-- SUBMIT -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data() {

            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            };

        },

        methods: {

            onSubmit() {
                axios.post(window.location.pathname + '/register', this.$data)
                .then(this.onSuccess);
            },

            onSuccess(){
                this.$router.push("/tasks");
            }

        }

    }
</script>