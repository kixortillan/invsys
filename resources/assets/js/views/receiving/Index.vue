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
						    Receiving Report
						    </v-toolbar-title>
						    <v-spacer />
						    <router-link class="white--text" :to="{ path: '/receiving/reports/report' }">
						    	<v-icon>add_circle_outline</v-icon>
						    </router-link>
						    <!-- <v-btn v-on:click.native="submit()" icon floating class="primary white--text">
								<v-icon>add_circle_outline</v-icon>
							</v-btn> -->
					 	 </v-toolbar>

					</v-card-row>

					<v-card-row>
<!-- 
						<v-container fluid>

							<v-row>
								<v-col xs4>
									<v-subheader v-text="headers[0]" />
								</v-col>
								<v-col xs3>
									<v-subheader v-text="headers[1]" />
								</v-col>
								<v-col xs3>
									<v-subheader v-text="headers[2]" />
								</v-col>
								<v-col xs2></v-col>
							</v-row>

							<v-divider></v-divider>

							<template v-for="item in items">
								<v-row>
									<v-col xs4>
										<p>{{ item.transaction_id }}</p>
									</v-col>
									<v-col xs3>
										<p>{{ item.invoice_number }}</p>
									</v-col>
									<v-col xs3>
										<p>{{ item.official_receipt_number }}</p>
									</v-col>
									<v-col xs2></v-col>
								</v-row>
								<v-divider></v-divider>
							</template>

						</v-container> -->

						<v-table-overflow class="datatable pa-3">
							<table>
								<thead>
									<tr>
										<th class="pt-3 pb-3" v-for="header in headers" v-text="header"></th>
										<th class="pt-3 pb-3"></th>
									</tr>
								</thead>
								<tbody>
									<template v-for="item in items">
										<tr>
											<td class="pt-3 pb-3"><a href="">{{ item.transaction_id }}</a></td>
											<td class="pt-3 pb-3" v-text="item.invoice_number"></td>
											<td class="pt-3 pb-3" v-text="item.official_receipt_number"></td>
											<td class="pt-3 pb-3"></td>
										</tr>
									</template>
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
				'Transaction ID', 'Invoice #', 'Official Rcpt #'
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

			axios.get('/inventory/receiving/reports', {
					
					params: {
						page: this.page,
						search: this.search,
						sort: this.sortBy,
						order_by: this.orderBy
					}

				}).then((response) => {
					
					//console.log(response.data)
					
					this.items = response.data.data
					this.meta = response.data.meta
					this.length = this.meta.pagination.total_pages
				})
				.catch((error) => {

					console.log(error)

				})

		}

	},

	mounted() {
		
		this.reload()
		
	}

}
</script>