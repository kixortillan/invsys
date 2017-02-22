
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example', require('./components/Example.vue'));*/

//Vue.component('vuelma-select', require('./components/VuelmaSelect.vue'));

Vue.component('vuelma-nav', require('./components/VuelmaNav.vue'));

Vue.component('vuelma-nav-offcanvas', require('./components/VuelmaNavOffcanvas.vue'));

const app = new Vue({
    el: '#app',
    methods: {
    //
    search (text) {
      //
      let down = text.toLowerCase()

      //
      this.searched = this.options.filter((i) => i.name.toLowerCase().includes(down))
    }
  }
});
