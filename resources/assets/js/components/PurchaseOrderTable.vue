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
        <div class="columns is-marginless is-mobile is-multiline">
        
            <div class="column is-10">
                <multiselect v-model="value" placeholder="Search SKU" label="sku" :internal-search="false" :options="options" :searcheable="true" :loading="isLoading" :options-limit="50" :limit="3" @search-change="search" v-on:select="selectListener">
                    <span slot="noResult">Oops! No matching SKU.</span>
                </multiselect>
                <!-- <input type="hidden" name="hdn_tmp_sku" v-model="sku">
                <input type="hidden" id="hdn_tmp_price" v-model="price"> -->
            </div>
            <div class="column is-2">
                <button @click="addRow" class="button is-primary is-fullwidth" type="button">Add</button>
            </div>
        </div>

        <div class="vuelma-dynamic-table">
            <div class="columns is-marginless is-mobile vuelma-dynamic-table-header">
                <div class="column vuelma-dynamic-table-column" v-for="header in headers">
                    
                    <p class="has-text-centered">{{ header }}</p>

                </div>            
            </div>

            <div class="columns is-marginless is-mobile" v-for="row in rows">

                <div class="column vuelma-dynamic-table-column" v-for="item in row">
                    
                    <input v-if="item.type === 'number'" type="number" name="" :value="item.value" class="input" :readonly="item.readonly" min="0">
                    <input v-else type="text" name="" :value="item.value" class="input" :readonly="item.readonly">

                </div>

            </div>
        </div>
    </div>
</template>

<script>


export default {
    data() {
        return {
            // sku: null,
            // price: null,
            value: null,
            options: [],
            isLoading: false,
            headers: [
                'SKU', 'Price', 'Qty'
            ],
            rows: [
            ]
        };
    },

    props(){
        return [

        ]
    },
 
    methods: {
        addRow() {
            var data = {
                sku: {
                    type: 'string',
                    value: this.value.sku,
                    readonly: true
                },
                price: {
                    type: 'string',
                    value: this.value.cost,
                    readonly: true
                },
                qty: {
                    type: 'number',
                    value: 0,
                    readonly: false
                }
            }

            this.rows.push(data)

        },

        search(search, loading) {
            this.isLoading = true

            axios.get('http://localhost:8000/inventory/skus/search', {
                params: {
                    q: search
                }
            }).then((resp) => {
               this.options = resp.data
               this.isLoading = false
            })
        },

        selectListener(data) {
            this.value = data
        }
    }
}
</script>
