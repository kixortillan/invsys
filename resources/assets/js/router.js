import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export const routes = [
    
    {
    	path: '/home', 
    	text: 'Dashboard', 
    	component: require('./views/Home.vue'), 
    	show: true
    },

    {
    	path: '/receiving/reports', 
    	text: 'Receiving Report', 
    	component: require('./views/receiving/Index.vue'), 
    	show: true
    },

    {
    	path: '/receiving/reports/report', 
    	text: 'New Receiving Report', 
    	component: require('./views/receiving/Create.vue'), 
    	show: false
    },

	{
		path: '/brands', 
		text: 'Brands', 
		component: require('./views/part/brand/Index.vue'), 
		show: true
	},

	{
		path: '/pnes', 
		text: 'Part Number Ext.', 
		component: require('./views/part/pne/Index.vue'), 
		show: true
	},    

]

export const router = new VueRouter({
	mode: 'history',
    routes: routes
})