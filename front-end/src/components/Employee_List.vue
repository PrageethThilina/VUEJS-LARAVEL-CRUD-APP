<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <router-link
          class="btn btn-primary"
          style="float: right"
          to="add-employee"
          >Add Employee</router-link
        >
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h2 class="text-center">Employee List</h2>
        <table class="table table-hover table-bordered table-responsive table-success" id="emp_table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">First Name</th>
              <th class="text-center">Last Name</th>
              <th class="text-center">Date of Birth</th>
              <th class="text-center">Section</th>
              <th class="text-center">Email</th>
              <th class="text-center">Phone</th>
              <th class="text-center">Address</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              <tr v-for="(em, empkey) in emp" :key="empkey">
                <td class="text-center">{{em.emp_id}}</td>
                <td class="text-center">{{em.emp_fname}}</td>
                <td class="text-center">{{em.emp_lname}}</td>
                <td class="text-center">{{em.emp_dob}}</td>
                <td class="text-center">{{em.emp_section}}</td>
                <td class="text-center">{{em.emp_email}}</td>
                <td class="text-center">{{em.emp_phone}}</td>
                <td class="text-center">{{em.emp_address}}</td>
                <td class="text-center"><router-link class="btn btn-warning" style="margin-right:10px" :to="'/edit-employee/'+em.emp_id">Edit</router-link><a class="btn btn-danger" @click="deleteEmployee($event)" v-bind:id="em.emp_id">Delete</a></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>

    export default {

        data() {
            return {
            emp: [],
            };
        },

        created() 
        {
            this.$http.get("http://localhost:8000/api/employee-list")
            .then(function (response){
                this.emp = response.body.emplist;
            })

        },
        methods:{
            deleteEmployee(event){
                 this.$http.delete("http://localhost:8000/api/delete-employee/"+event.target.id)
                 .then(function (response){
                     window.location.reload();
                 })
            }
        }

    };

</script>

<style>
.container-fluid {
  margin-top: 30px;
  margin-bottom: 30px;
}

h2 {
  margin-top: 20px;
  margin-bottom: 20px;
}

th {
  width: 400px;
  background: rgb(11, 141, 43);
}

.table {
  display: block;
  overflow-x: auto;
  overflow-y: auto;
  white-space: nowrap;
}
</style>
