import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Employee_List from './components/Employee_List.vue'
import Add_Employee from './components/Add_Employee.vue'
import Edit_Employee from './components/Edit_Employee.vue'

const router = new VueRouter({

    mode: 'history',
    routes: [
        { path:"", component:Employee_List},
        { path:"/add-employee", component:Add_Employee},
        { path:"/edit-employee/:id", component:Edit_Employee},

    ]
});

export default router

