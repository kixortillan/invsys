export default [
    
	{
    	path: '/', 
    	text: 'Login', 
    	component: require('./views/auth/Login.vue'), 
    	show: false
    },

    {
    	path: '/home', 
    	text: 'Dashboard', 
    	component: require('./views/Home.vue'), 
    	show: true
    },

    {
        path: '/inventory/skus', 
        text: 'Part Master File', 
        component: require('./views/inventory/sku/Index.vue'), 
        show: true
    },

    {
        path: '/inventory/skus/sku', 
        text: 'Part Master File', 
        component: require('./views/inventory/sku/Create.vue'), 
        show: false
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
		path: '/parts/brands', 
		text: 'Brands', 
		component: require('./views/part/brand/Index.vue'), 
		show: true
	},

    {
        path: '/parts/brands/brand', 
        text: 'Brands', 
        component: require('./views/part/brand/Create.vue'), 
        show: false
    },

	{
		path: '/parts/pnes', 
		text: 'Part Number Ext.', 
		component: require('./views/part/pne/Index.vue'), 
		show: true
	},

	{
		path: '/parts/pnes/pne', 
		text: 'Part Number Ext.', 
		component: require('./views/part/pne/Create.vue'), 
		show: false
	},

]