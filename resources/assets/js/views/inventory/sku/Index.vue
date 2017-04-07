<template>
	<v-container fluid>
		
		<v-row>
			<v-col sm2></v-col>

			<v-col sm8>

				<v-card>

					<v-card-row>
					    
					    <v-toolbar>
					    	<v-icon class="white--text">list</v-icon>
						    <v-toolbar-title class="white--text">
						    Part Master File
						    </v-toolbar-title>
						    <v-spacer />
						    <router-link class="white--text" :to="{ path: '/inventory/skus/sku' }">
						    	<v-icon>add_circle_outline</v-icon>
						    </router-link>
						    <!-- <v-btn v-on:click.native="submit()" icon floating class="primary white--text">
								<v-icon>add_circle_outline</v-icon>
							</v-btn> -->
					 	 </v-toolbar>

					</v-card-row>

					<v-card-row>

						<v-table-overflow class="datatable pa-3">
							<table>
								<thead>
									<tr>
										<th class="pt-3 pb-3" v-for="header in headers" v-text="header"></th>
									</tr>
								</thead>
								<tbody>
									<tr v-if="items.length > 0" v-for="item in items">
										<td class="pt-3 pb-3"><a href="">{{ item.pne_code }}</a></td>
										<td class="pt-3 pb-3" v-text="item.description"></td>
									</tr>
									<tr v-else>
										<td :colspan="headers.length" class="text-xs-center">
										No records found
										</td>
									</tr>
								</tbody>
							</table>
						</v-table-overflow>

					</v-card-row>

					<v-card-row actions>
						<v-pagination v-bind:length.number="length" v-model="page" v-on:click.native="reload()" />
					</v-card-row>

				</v-card>

			</v-col>

			<v-col sm2></v-col>

		</v-row>
	</v-container>
</template>

<script>

export default {

	data() {

		return {

			//column header of spreasheet
			headers: [
				'SKU', 'Brand', 'Cost', 'On Hand', 'Available', 'Reserved', 'On Order', 'Unserved'
			],
			
			//list of receiving reports
			items: null,

			//
			meta: null,

			//
			page: 1,

			//
			search: null,

			//
			orderBy: null,

			//
			sortBy: null,

			//
			length: 0
		}

	},

	methods: {

		reload(){

			this.$http.get('/api/inventory/skus', {
					
					params: {
						page: this.page,
						search: this.search,
						sort: this.sortBy,
						order_by: this.orderBy
					},

					headers: {
						Authorization: 'Bearer ' + localStorage.getItem('access_token')
					}

				}).then((response) => {
					
					//console.log(response.data)
					if(response === undefined){
						return;
					}
					
					this.items = response.data.data
					
					if(response.data.meta !== undefined){
						this.meta = response.data.meta
						this.length = this.meta.pagination.total_pages
					}
			
				})
				.catch((error) => {

					console.log(error)

				})

		}

	},

	created() {
		
		this.reload()
		
	}

}
</script>