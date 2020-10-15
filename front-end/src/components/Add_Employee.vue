<template>

   <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" style="margin-top: 20px;">
                <img src="../assets/images/user2.png" alt="" class="img img-fluid" style="width: 400px; height: 400px">
            </div>
            <div class="col-md-6 card mx-auto" style="margin-top: 20px;">
                <h2 class="text-center">Add employee</h2>

                   <!-- Success message -->
                <div class="alert alert-success" v-show="success">Saved Successfully...!!!</div>
                   <!-- Error message -->
                <div class="alert alert-danger" v-show="error_msg">Error in saving please try again...!!!</div>

                <form @submit.prevent="submitForm">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <ValidationProvider name="First Name" :rules="{ required: true }" v-slot="{ errors }">
                            <input type="text" class="form-control" id="emp_fname" v-model="emp.emp_fname" name="emp_fname" placeholder="Frist Name">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <ValidationProvider name="Last Name" :rules="{ required: true }" v-slot="{ errors }">
                            <input type="text" class="form-control" id="emp_lname" v-model="emp.emp_lname" name="emp_lname" placeholder="Last Name">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                       <ValidationProvider name="Date of birth" :rules="{ required: true }" v-slot="{ errors }">
                            <input type="date" class="form-control" id="emp_dob" v-model="emp.emp_dob" name="emp_dob" placeholder="dd/mm/yyyy">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>    
                    </div>
                    <div class="form-group">
                        <label for="">Section</label>
                        <ValidationProvider name="Section" :rules="{ required: true }" v-slot="{ errors }">
                        <select class="form-control" name="emp_section" id="emp_section" v-model="emp.emp_section">
                            <option value="" selected>Choose an option</option>
                            <option value="Packing">Packing</option>
                            <option value="Cutting">Cutting</option>
                            <option value="Mixing">Mixing</option>
                            <option value="Stores">Stores</option>
                        </select>
                        <span class="text-danger">
                                {{ errors[0] }}
                        </span>
                        </ValidationProvider> 
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <ValidationProvider name="Email" :rules="{ required: true, email: true }" v-slot="{ errors }">
                            <input type="email" class="form-control" id="emp_email" v-model="emp.emp_email" name="emp_email" placeholder="user@gmail.com">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <ValidationProvider name="Phone Number" :rules="{ required: true,numeric: true, min: 10, max: 10 }" v-slot="{ errors }">
                            <input type="tel" class="form-control" id="emp_phone" v-model="emp.emp_phone" name="emp_phone" placeholder="071 6925322">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <ValidationProvider name="Email" :rules="{ required: true }" v-slot="{ errors }">
                            <textarea rows="3" class="form-control" id="emp_address" v-model="emp.emp_address" name="emp_address" placeholder="Address"></textarea>
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <button v-show="emp.emp_fname && emp.emp_lname && emp.emp_dob && emp.emp_section && emp.emp_email && emp.emp_phone && emp.emp_address" type="submit" class="btn btn-info" style="width: 100%;margin-bottom: 20px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        data () {
            return{
                emp:{
                    emp_fname:'',
                    emp_lname:'',
                    emp_dob:'',
                    emp_section:'',
                    emp_email:'',
                    emp_phone:'',
                    emp_address:'',
                },
                success:false,
                error_msg:false
            }
        },

        methods: {

            submitForm() {
                this.$http.post("http://localhost:8000/api/add-employee", this.emp)
                .then(function (response)
                {
                    this.success = true;
                    setTimeout(() => this.$router.push('/'), 2500);
                })
                .catch(error => {
                    this.error_msg = true;
                    setTimeout(() => window.location.reload(), 2500);
                })
            }
        }

    };

</script>

<style>

</style>
