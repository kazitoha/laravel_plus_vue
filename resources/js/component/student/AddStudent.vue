<template lang="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: right">
                        <router-link :to="{ name: 'List' }" class="btn btn-info"
                            >Student List</router-link
                        >
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="StoreData">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputName1"
                                    aria-describedby="emailHelp"
                                    placeholder="Enter email"
                                    v-model="form.name"
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
                                    placeholder="Enter email"
                                    v-model="form.email"
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
                                    aria-describedby="emailHelp"
                                    placeholder="Enter phone number"
                                    v-model="form.phone"
                                />
                                <span v-if="errors.phone" class="text-danger">{{
                                    errors.phone[0]
                                }}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputGender1">Gender</label>
                                <select
                                    class="form-select"
                                    aria-label="Default select example"
                                    v-model="form.gender"
                                >
                                    <option value="" selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span
                                    v-if="errors.gender"
                                    class="text-danger"
                                    >{{ errors.gender[0] }}</span
                                >
                            </div>

                            <br />
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
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
            form: {
                name: "",
                email: "",
                phone: "",
                gender: "",
            },
            errors: {},
        };
    },
    methods: {
        StoreData() {
            axios
                .post("api/students", this.form)
                .then((res) => {
                    if (res.status === 201) {
                        this.form = "";
                        this.errors = "";

                        this.$notify(
                            {
                                group: "foo",
                                title: "Success",
                                text: "Student data inserted Successfully.",
                            },
                            5000
                        );
                    }
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
    },
};
</script>
<style lang=""></style>
