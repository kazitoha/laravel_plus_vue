<template>
    <div>
        <form @submit.prevent="updateTeacher()">
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputName1"
                    aria-describedby="nameHelp"
                    placeholder="Enter Name"
                    v-model="submitForm.name"
                />
                <span v-if="errors.name" class="text-danger">{{
                    errors.name[0]
                }}</span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Enter email address."
                    v-model="submitForm.email"
                />
                <span v-if="errors.email" class="text-danger">{{
                    errors.email[0]
                }}</span>
            </div>

            <div class="form-group">
                <label for="exampleInputPhone1">Phone</label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputPhone1"
                    placeholder="Enter Phone number."
                    v-model="submitForm.phone"
                />
                <span v-if="errors.phone" class="text-danger">{{
                    errors.phone[0]
                }}</span>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            submitForm: {
                name: "",
                email: "",
                phone: "",
            },
            errors: {},
        };
    },
    mounted() {
        this.getTeacherData();
    },
    methods: {
        getTeacherData() {
            axios
                .get("/api/teachers/" + this.$route.params.id)
                .then((res) => {
                    this.submitForm = res.data.data;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
        updateTeacher(){
            axios
                .put("/api/teachers/" + this.$route.params.id,this.submitForm)
                .then((res) => {
                    if(res.status ===200){
                        this.$notify(
                            {
                                group: "foo",
                                title: "Success",
                                text: "Teacher data updated Successfully.",
                            },
                            4000
                        );
                        this.errors = "";
                        this.$router.push({ name: "List" });

                       
                    }
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        }

    },
};
</script>
