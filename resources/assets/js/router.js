import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export const routes = [
    
    {path: '/home', text: 'Dashboard', component: require('./views/Home.vue')},

    {path: '/receiving/reports', text: 'Receiving', component: require('./views/receiving/Index.vue')},

	{path: '/receiving/reports/report', component: require('./views/receiving/Create.vue')},    

	{path: '/brands', text: 'Brands', component: require('./views/part/brand/Index.vue')},

	{path: '/pnes', text: 'Part Number Ext.', component: require('./views/part/pne/Index.vue')},    

]

export const router = new VueRouter({
	mode: 'history',
    routes: routes
})