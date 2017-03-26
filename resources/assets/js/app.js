
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * 
 */
import {router, routes} from './router'

import config from './config'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example', require('./components/Example.vue'));*/

//Vue.component('vuelma-select', require('./components/VuelmaSelect.vue'));

Vue.component('app', require('./App.vue'));

Vue.component('vuelma-nav', require('./components/VuelmaNav.vue'));

Vue.component('vuelma-nav-offcanvas', require('./components/VuelmaNavOffcanvas.vue'));

Vue.component('vuelma-notif', require('./components/VuelmaNotif.vue'));

Vue.component('vuelma-dynamic-table', require('./components/VuelmaDynamicTable.vue'));

Vue.component('vuelma-file-upload', require('./components/VuelmaFileUpload.vue'));

Vue.component('purchase-order-table', require('./components/PurchaseOrderTable.vue'));

Vue.component('vue-handsontable', require('./components/VueHandsontable.vue'));

import Multiselect from 'vue-multiselect'

// register globally
Vue.component('multiselect', Multiselect)

const app = new Vue({
    el: '#app',
    template: '<app :routes="routes" :brand="brand"></app>',
    router,
    data() {
    	return {
    		routes: routes,
    		brand: config.appName
    	}
    }
});
