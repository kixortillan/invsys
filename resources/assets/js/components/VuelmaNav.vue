<style scoped>
.nav{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
}

.nav-left {
    overflow: hidden;
}

.dark {
    background-color: #222;
    border-color: #080808;
}

.dark * {
    background-color: #222;
    border-color: #080808;  
}

.dark * {
    color: #fff !important;
}
</style>

<template>
    <nav class="nav dark">
        <div class="nav-left">
            <slot name="nav-button"></slot>
            <a class="nav-item">
                <slot name="nav-brand">
                    <img src="" alt="Brand">
                </slot>
            </a>
        </div>

        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span class="nav-item is-hidden-tablet" @click="toggle">
            <a class="button">
                <span class="icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
            </a>
        </span>

        <div class="nav-right nav-menu" :class="{ 'is-active':showNav }">
            <slot name="nav-menu-links"></slot>
        </div>
    </nav>
</template>

<script>
module.exports = {
    data: function (){
        return {
            showNav: false
        };
    },

    props: [
        'navlinks'
    ],
 
    methods: {
        toggle: function(event) {
            event.stopPropagation();
            this.showNav = !this.showNav;
        }
    }
}
</script>
