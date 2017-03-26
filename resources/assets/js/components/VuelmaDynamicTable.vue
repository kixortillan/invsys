<style scoped>
.vuelma-dynamic-table {
    border-right: 1px solid lightgray;
    border-top: 1px solid lightgray;
}

.vuelma-dynamic-table-column {
    border-left: 1px solid lightgray;
    border-bottom: 1px solid lightgray;
}
</style>

<template>
    <div>
        
        <input type="text" name="" class="input">

        <div class="vuelma-dynamic-table">
            <button @click="addRow()">Add</button>
            <div class="columns is-marginless is-mobile vuelma-dynamic-table-header">
                <div class="column vuelma-dynamic-table-column" v-for="(item, index) in h = JSON.parse(header)">
                    
                    <p class="has-text-centered">{{ h[index] }}</p>

                </div>            
            </div>

            <div class="columns is-marginless is-mobile" v-for="row in JSON.parse(rows)">

                <div class="column vuelma-dynamic-table-column" v-for="(item, index) in row">
                    
                    <!-- <input type="text" name="" :value="row[index]" class="input"> -->
                    <p>{{ row[index] }}</p>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    data: function (){
        return {

        };
    },

    props: [
        'header', 'rows'
    ],
 
    methods: {
        addRow: function(json) {
            // alert('yes  ');
            data = JSON.parse(json);

            if(header.length !== data.length){
                throw new Error('Column data does not match header!');
            }

            this.rows.push(data);
        },

        test: function(str){
            alert(str);
        }
    }

    // events: {
    //     addRowEvent: function(){
    //         this.$emit
    //     }
    // }
}
</script>
