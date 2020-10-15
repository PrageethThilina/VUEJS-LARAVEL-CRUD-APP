<template>

   <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" style="margin-top: 20px;">
                <img src="../assets/images/user2.png" alt="" class="img img-fluid" style="width: 400px; height: 400px">
            </div>
            <div class="col-md-6 card mx-auto" style="margin-top: 20px;">
                <h2 class="text-center">Edit employee</h2>

                   <!-- Success message -->
                <div class="alert alert-success" v-show="success">Updated Successfully...!!!</div>
                   <!-- Error message -->
                <div class="alert alert-danger" v-show="error_msg">Error in updating please try again...!!!</div>

                <form @submit.prevent="updateEmployee">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <ValidationProvider name="First Name" :rules="{ required: true }" v-slot="{ errors }">
                            <input type="text" class="form-control" v-model="employee.emp_fname" id="emp_fname" name="emp_fname" placeholder="Frist Name">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <ValidationProvider name="Last Name" :rules="{ required: true }" v-slot="{ errors }">
                            <input type="text" class="form-control" v-model="employee.emp_lname" id="emp_lname" name="emp_lname" placeholder="Last Name">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                       <ValidationProvider name="Date of birth" :rules="{ required: true }" v-slot="{ errors }">
                            <input type="date" class="form-control" v-model="employee.emp_dob" id="emp_dob" name="emp_dob" placeholder="dd/mm/yyyy">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>    
                    </div>
                    <div class="form-group">
                        <label for="">Section</label>
                        <ValidationProvider name="Section" :rules="{ required: true }" v-slot="{ errors }">
                        <select class="form-control" v-model="employee.emp_section" name="emp_section" id="emp_section">
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
                            <input type="email" class="form-control" v-model="employee.emp_email" id="emp_email" name="emp_email" placeholder="user@gmail.com">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <ValidationProvider name="Phone Number" :rules="{ required: true,numeric: true, min: 10, max: 10 }" v-slot="{ errors }">
                            <input type="tel" class="form-control" v-model="employee.emp_phone" id="emp_phone" name="emp_phone" placeholder="071 6925322">
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <ValidationProvider name="Email" :rules="{ required: true }" v-slot="{ errors }">
                            <textarea rows="3" class="form-control" v-model="employee.emp_address" id="emp_address" name="emp_address" placeholder="Address"></textarea>
                            <span class="text-danger">
                                {{ errors[0] }}
                            </span>
                        </ValidationProvider>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <button type="submit" class="btn btn-info" style="width: 100%;margin-bottom: 20px;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        
        created(){
            this.getEmpDetails();
        },

        data(){
            return {
                employee:{

                },
                success:false,
                error_msg:false
            }
        },

        methods: {
            getEmpDetails()
            {
              this.$http.get('http://localhost:8000/api/get-employee-details/'+this.$route.params.id)
              .then(function (response){
                  this.employee = response.body.employee;
              })
            },
            updateEmployee()
            {
                this.$http.put('http://localhost:8000/api/edit-employee/'+this.$route.params.id, this.employee)
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
        
    }
</script>