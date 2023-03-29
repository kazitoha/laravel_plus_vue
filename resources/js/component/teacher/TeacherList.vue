<template>
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(teacher,index) in teachers.data">
                    <th scope="row">{{ ++index }}</th>
                    <td>{{ teacher.name }}</td>
                    <td>{{ teacher.email }}</td>
                    <td>{{ teacher.phone }}</td>
                    <td>
                        <router-link :to="{ name: 'TeacherEdit', params: { id: teacher.id }}" class="btn btn-success">Edit</router-link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            teachers: [],
        };
    },
    mounted() {
        this.dataFetch();
    },
    methods: {
        dataFetch() {
            axios.get("api/teachers").then((res) => {
                this.teachers = res.data;
            });
        },
    },
};
</script>
