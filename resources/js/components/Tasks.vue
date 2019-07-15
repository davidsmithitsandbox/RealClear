<template>
    <div class="container" style="padding-top:1rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Task List
                    </div>
                    <div class="card-body" id="app">
                        <div id="app">

                            <!-- TASK LIST INDEX -->
                            <ul class="list-group list-group-flush">
                                <li v-bind:key="task" v-for="task in tasks" v-text="task" :value="task"
                                    class="list-group-item">
                                </li>
                            </ul>

                            <form method="POST" action="/tasks" @submit.prevent="onSubmit" class="list-group">

                                <!-- DESCRIPTION -->
                                <ul class="list-group list-group-flush">
                                    <input v-model="description" id="description" name="description" type="text"
                                        class="form-control" required>
                                </ul>

                                <!-- SUBMIT -->
                                <button style="margin-top:1rem" type="submit" class="btn btn-primary">Add</button>

                            </form>

                        </div>
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
                tasks: [],
                description: ''
            };
        },
        methods: {
            onSubmit() {
                axios.post(window.location.pathname + '/tasks', this.$data)
                    .then(this.onSuccess);
            },
            onSuccess() {
                this.description = '';
                axios.get('tasks').then(response => this.tasks = response.data);
            }
        },
        mounted() {
            axios.get('tasks').then(response => this.tasks = response.data)
        }
    }
</script>