import { createWebHistory, createRouter } from 'vue-router';

import Index from "./components/employees/Index"
import Create from "./components/employees/Create"
import Edit from "./components/employees/Edit"

export const routes = [
    {
        path:"/employees",
        component:Index,
        name:"Index"
    },
    {
        path:"/employees/create",
        component:Create,
        name:"Create"
    },
    {
        path:"/employees/:id",
        component:Edit,
        name:"Edit"
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;