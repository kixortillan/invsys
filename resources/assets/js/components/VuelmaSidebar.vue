<template>
    <div class="sidebar">

        <nav class="nav has-shadow">
            <div class="nav-left">
                <span class="nav-item" @click="toggleNav">
                    <a id="btn-menu" class="button">
                        <span class="icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </a>
                </span>
                <a class="nav-item">
                    <slot name="nav-brand">
                        <img src="" alt="Brand">
                    </slot>
                </a>
            </div>

            <slot name="nav-items-right"></slot>
        </nav>

        <div id="vuelma-sidebar-overlay" class="is-overlay" style="display: none;" @click="toggleNav"></div>

        <aside id="vuelma-sidebar" class="menu" :class="{ show: showSidebar }">
            <ul class="menu-list">
                <li v-for="item in menu" @click="collapse">
                    <a>
                    {{ item.text }}
                    <span v-if="item.hasOwnProperty('more')" class="icon is-small is-pulled-right">
                        <i class="fa fa-caret-square-o-right"></i>
                    </span>
                    </a>
                    <ul v-if="item.hasOwnProperty('more')">
                        <li v-for="innerItem in item.more">
                            <a>{{ innerItem.text }}</a>
                        </li>
                    </u>
                </li>
            </ul>
        </aside>

    </div>
</template>

<style scoped>
.nav-left {
    overflow: hidden;
}

.menu-list > li > ul {
    display: none;
}

.menu-list a {
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
    left: -300px;
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
        'menu'
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