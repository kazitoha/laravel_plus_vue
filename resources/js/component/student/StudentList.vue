<template lang="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: right">
                        <router-link :to="{ name: 'Add' }" class="btn btn-info"
                            >Add Student</router-link
                        >
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(student, index) in students.data">
                                    <th scope="row">{{ ++index }}</th>
                                    <td>{{ student.name }}</td>
                                    <td>{{ student.email }}</td>
                                    <td>{{ student.phone }}</td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'StudentEdit',
                                                params: { id: student.id },
                                            }"
                                            class="btn btn-info"
                                            >Edit</router-link
                                        >
                                        <button
                                            class="btn btn-danger"
                                            @click.prevent="
                                                studentDelete(student.id)
                                            "
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            students: [],
            form: {
                name: "",
                email: "",
                phone: "",
                gender: "",
            },
            error: [],
        };
    },
    mounted() {
        this.fetchData();
    },

    methods: {
        fetchData() {
            axios.get("api/students").then((res) => {
                this.students = res.data;
            });
        },

        studentDelete(id) {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            axios.delete("api/students/" + id).then((res) => {
                if (res.status === 200) {
                    this.fetchData();
                }
            });
        },

        studentEdit(id) {
            axios.get("api/students/" + id).then((res) => {
                console.log(res);
            });
        },
    },
};
</script>
<style lang=""></style>
