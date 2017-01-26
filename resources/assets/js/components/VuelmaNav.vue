<template>
    <nav class="nav has-shadow">
        <div class="nav-left">
            <a class="nav-item">
                <img src="" alt="Brand">
            </a>
            <slot name="nav-items-left"></slot>
        </div>
        
        <div class="nav-center">
            <slot name="nav-items-center"></slot>
        </div>
        
        <slot name="nav-items-right"></slot>

        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </nav>
</template>

<script>
module.exports = {
    data: function (){
        return {

        };
    }   
}    
</script>
