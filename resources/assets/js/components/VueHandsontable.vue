<style scoped>
	.spreadsheet {
		width: 100%;
		z-index: 1;
	}
</style>

<template>
	<div :id="id" class="spreadsheet"></div>
</template>

<script>
	import Handsontable from 'handsontable/dist/handsontable.full'

	export default {
		data() {
			return {
				
			}
		},

		props: {
			header: {
				datatype: String,
				required: true,
			},
			id: {
				datatype: String,
				required: true
			}
		},

		mounted(){
			let h = Array.from(new Array(this.header))
			let container = document.getElementById(this.id)
			
			let hot = new Handsontable(container, {
		  		data: h,
		  		rowHeaders: true,
		  		colHeaders: true,
		  		contextMenu: true,
				minSpareRows: 1,
				stretchH: 'all'
			})
		}

	}
</script>