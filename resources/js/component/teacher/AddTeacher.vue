<template>
    <div>
        <form @submit.prevent="storeTeacherData()">
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
                    type="number"
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
            <button type="submit" class="btn btn-primary">Submit</button>
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
    methods: {
        storeTeacherData() {
            axios
                .post("api/teachers", this.submitForm)
                .then((res) => {
                    if (res.status === 201) {
                        this.submitForm = "";
                        this.errors = "";
                    }
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
    },
};
</script>
