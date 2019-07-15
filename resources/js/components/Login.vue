<template>
    <div class="container" style="padding-top:1rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        LOGIN
                    </div>
                    <div class="card-body">
                        
                        <form method="POST" action="/login" @submit.prevent="onSubmit">

                            <!-- CSRF -->
                            <input type="hidden" name="_token" :value="csrf">

                            <!-- EMAIL -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-4">
                                    <input v-model="email" id="email" type="email" class="form-control" name="email" value="" required autocomplete="email">
                                </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-4">
                                    <input v-model="password" id="password" type="password" class="form-control" name="password" value="" required autocomplete="password">
                                </div>
                            </div>

                            <!-- SUBMIT -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
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
                email: '',
                password: '',
            };

        },

        methods: {

            onSubmit() {
                axios.post(window.location.pathname + '/login', this.$data)
                .then(this.onSuccess);
            },

            onSuccess(){
                this.$router.push("/tasks");
            }

        }

    }
</script>