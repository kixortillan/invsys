<style scoped>
</style>

<template>
    <div class="notification" :class="{ 'is-primary':primary, 'is-success':success, 'is-info':info, 'is-warning':warning, 'is-danger':danger }">
        <button class="delete" @click="close"></button>
        {{ this.text }}
    </div>
</template>

<script>
module.exports = {
    data: function (){
        return {
            primary: false,
            success: false,
            info: false,
            warning: false,
            danger: false,
        };
    },

    props: [
        'text', 'type'
    ],
 
    methods: {
        close: function(event) {
            event.stopPropagation();
            Array.from(document.getElementsByClassName('notification')).forEach(function(el){
                el.remove();
            });
        }
    },

    beforeCreate: function(){
        if(this.type === null){
            return;
        }

        if(this.hasOwnProperty(this.type)){
            this[this.type] = true;
        }
    }
}
</script>
