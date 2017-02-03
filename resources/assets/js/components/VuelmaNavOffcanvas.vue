<template>
    <div class="sidebar">

        <vuelma-nav :navlinks="navlinks">

            <span slot="nav-button" class="nav-item" @click="toggleNav">
                <a id="btn-menu" class="button">
                    <span class="icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </a>
            </span>

            <template slot="nav-brand">
                <slot name="nav-brand"></slot>
            </template>

            <template slot="nav-menu-links">
                <slot name="nav-menu-links"></slot>
            </template>
            
        </vuelma-nav>

        <div id="vuelma-sidebar-overlay" class="is-overlay" style="display: none;" @click="toggleNav"></div>

        <aside id="vuelma-sidebar" class="menu" :class="{ show: showSidebar }">

            <ul class="menu-list">
                <li v-for="(item, index) in menu" @click="collapse">
                    <a v-if="typeof item === 'object'">
                        {{ index }}
                        <span class="icon is-small is-pulled-right">
                            <i class="fa fa-caret-square-o-right"></i>
                        </span>
                    </a>
                    <a v-else :href="item">{{ index }}</a>

                    <ul v-if="typeof item === 'object'">
                        <li v-for="(item, index) in item">
                            <a :href="item">{{ index }}</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </aside>

    </div>
</template>

<style scoped>
.menu-list > li > ul {
    display: none;
}

.menu-list a {, ind
    border-radius: 0;
}

.is-overlay {
    z-index: 1000;
    background-color: rgba(10, 10, 10, 0.86);
}

.menu > ul > li {
    border-bottom: 1px solid #dbdbdb;
}

.menu {
    position: fixed;
    bottom: 0;
    left: -65%;
    top: 0;
    height: 100%;
    z-index: 10001;
    background-color: rgba(255, 255, 255, 1);
}

.show {
    left: 0;
    transition: left ease-in 0.2s;
}

@media screen and (max-width: 768px) {
    .menu {
        width: 65%;
    }
}

@media screen and (min-width: 769px) {
    .menu {
        width: 300px;
    }
}
</style>

<script>
module.exports = {
    data: function (){
        return {
            showSidebar: false
        };
    },

    props: [
        'menu',
        'navlinks'
    ],
 
    methods: {
        collapse: function(event) {
            event.stopPropagation();
            a = document.querySelectorAll('#vuelma-sidebar a');

            a.forEach(function(item, index){
                item.classList.remove('is-active');
            });

            if(event.target.classList.contains('is-active')){
                event.target.classList.remove('is-active');
            } else {
                event.target.classList.add('is-active');
            }

            cl = document.querySelectorAll('#vuelma-sidebar li > ul');

            cl.forEach(function(item, index){
                item.style.display = 'none';
            });

            ul = event.target.nextElementSibling;

            if(ul){
                ul.style.display = 'block';
            }
        },

        toggleNav: function(event) {
            event.stopPropagation();
            this.showSidebar = !this.showSidebar;
            ov = document.getElementById('vuelma-sidebar-overlay');
            if(ov.style.display === 'none') {
                ov.style.display = 'block';
            } else {
                ov.style.display = 'none';
            }
        }
    } 
}
</script>