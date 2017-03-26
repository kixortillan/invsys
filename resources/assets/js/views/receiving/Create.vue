<template>
	<v-container fluid>
		
		<v-row>
			<v-col sm2></v-col>

			<v-col sm8>

				<v-card>

					<v-card-row>
					    <v-toolbar>
					    	<router-link :to="{ path: '/receiving/reports' }" class="white--text">
					    		<v-icon>arrow_back</v-icon>
					    	</router-link>
						    <v-toolbar-title class="white--text">
						    Create Receiving Report
						    </v-toolbar-title>
						    <v-spacer />
						    <v-btn v-on:click.native="submit()" icon floating class="primary white--text">
								<v-icon>done</v-icon>
							</v-btn>
					 	 </v-toolbar>
					</v-card-row>
						
					<v-subheader>Invoice Details</v-subheader>
					<v-card-row>
						<v-container fluid>
							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="invoiceNum" label="Invoce #"></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="orNum" label="Official Receipt #"></v-text-field>
								</v-col>
								<v-col sm1></v-col>
							</v-row>
						</v-container>
					</v-card-row>

					<v-subheader>Item List</v-subheader>
					<v-card-row class="pb-5">
						<v-container fluid>
							<v-row>
								<v-col sm1></v-col>
								<v-col sm10>
									<div id="receiving_list" ref="receivingList" class="spreadsheet"></div>
								</v-col>
								<v-col sm1></v-col>
							</v-row>
						</v-container>
					</v-card-row>

				</v-card>

			</v-col>

			<v-col sm2></v-col>

		</v-row>
	</v-container>
</template>

<script>
import Handsontable from 'handsontable/dist/handsontable.full'

export default {

	data() {

		return {

			//column header of spreasheet
			headers: [
				'SKU (PartNum-PartNumExt)', 'QTY', 'COST', 'LOCATION'
			],
			
			//invoice number textfield
			invoiceNum: null,
			
			//official receipt numbert textfield
			orNum: null,
			
			//spreadsheet containing list of item being received
			sheet: null

		}

	},

	methods: {

		submit(){

			axios.post('/inventory/receiving/reports/report', {
					
					invoice_num: this.invoiceNum,
					or_num: this.orNum,
					item_list: this.sheet.getData()

				}).then(function(response){
					
					console.log(response.data) 

				})
				.catch(function(error){

					console.log(error)

				})

		}

	},

	mounted() {
		this.sheet = new Handsontable(this.$refs.receivingList, {
								rowHeaders: true,
								colHeaders: this.headers,
								contextMenu: true,
								minSpareRows: 1,
								startRows: 1,
								stretchH: 'all',
								columns: [
									{
										data: 'sku', 
										type: 'autocomplete',
										//strict: true,
										source: function(query, process){
											axios.get('/inventory/skus/search', {params: {q: query}})
												.then(function(response){
													//console.log(response.data)
													process(response.data)
												})
												.catch(function(error){
													console.log(error)
												})
										}
									},
									{
										data: 'qty', 
										type: 'numeric',
										format: '0'
									},
									{
										data: 'cost', 
										type: 'numeric',
										format: '0,0.00'
									},
									// {
									// 	data: 'currency', 
									// 	type: 'autocomplete',
									// 	strict: true, 
									// 	source: function(query, process){
									// 		axios.get('/config/currencies/search', {params: {q: query}})
									// 			.then(function(response){
									// 				process(response.data)
									// 			})
									// 			.catch(function(error){
									// 				console.log(error)
									// 			})
									// 	}
									// },
									{
										data: 'location', 
										type: 'autocomplete',
										strict: true, 
										source: function(query, process){
											axios.get('/inventory/binnings/location/search', {params: {q: query}})
												.then(function(response){
													process(response.data)
												})
												.catch(function(error){
													console.log(error)
												})
										}
									}
								],
							})
	}

}
</script>