<template>
	<v-container fluid>
		
		<v-row>
			<v-col sm2></v-col>

			<v-col sm8>

				<v-card>

					<v-card-row>
					    <v-toolbar>
					    	<v-btn v-on:click.native="back()" icon class="white--text">
					    		<v-icon>arrow_back</v-icon>
					    	</v-btn>
						    <v-toolbar-title class="white--text">
						    Parts Master
						    </v-toolbar-title>
						    <v-spacer></v-spacer>
						    <v-btn v-on:click.native="submit()" icon floating class="primary white--text">
								<v-icon>done</v-icon>
							</v-btn>
					 	 </v-toolbar>
					</v-card-row>
						
					<v-subheader>Parts Info</v-subheader>
					<v-card-row>
						<v-container fluid>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="partNumber" label="Part # " required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-select v-bind:items="pneCodeSelect" v-model="pneCode" item-text="pne_code" label="PNE Code">
									</v-select>
								</v-col>
								<v-col sm1></v-col>
							</v-row>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="brand" label="Brand name " required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="description" label="Description"></v-text-field>
								</v-col>
								<v-col sm1></v-col>
							</v-row>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-switch label="Hazardous" primary v-model="isHazardous" light />
								</v-col>
								<v-col sm5>
									<v-switch label="Has Expiration" primary v-model="hasExpiration" light />
								</v-col>
								<v-col sm1></v-col>
							</v-row>

						</v-container>
					</v-card-row>

					<v-subheader>Stock Details</v-subheader>
					<v-card-row>
						<v-container fluid>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="onHand" type="number" min="0" label="On Hand" required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="available" label="Available"></v-text-field>
								</v-col>
								<v-col sm1></v-col>
							</v-row>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="reserved" label="Reserved" required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="onOrder" label="On Order"></v-text-field>
								</v-col>
								<v-col sm1></v-col>
							</v-row>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="issued" label="Issued" required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="unserved" label="Unserved"></v-text-field>
								</v-col>
								<v-col sm1></v-col>
							</v-row>

						</v-container>
					</v-card-row>

					<v-subheader>Pricing</v-subheader>
					<v-card-row>
						<v-container fluid>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="srp" label="SRP" required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-select v-bind:items="currencySelect" v-model="srpCurrency" item-text="currency_code"label="SRP Currency" required>
									</v-select>
								</v-col>
								<v-col sm1></v-col>
							</v-row>

							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="cost" label="Cost" required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-select v-bind:items="currencySelect" v-model="costCurrency" item-text="currency_code" label="Cost Currency" required>
									</v-select>
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
import rules from '../../../validation/form'


export default {

	data() {

		return {

			//Part Number Extension textfield
			partNumber: null,
			
			//Description textfield
			pneCode: {},

			//
			brand: null,

			//
			isHazardous: null,

			//
			hasExpiration: null,

			//
			description: null,

			//
			onHand: null,

			//
			available: null,

			//
			reserved: null,

			//
			onOrder: null,

			//
			unserved: null,

			//
			issued: null,

			//
			srp: null,

			//
			srpCurrency: null,

			//
			cost: null,

			//
			costCurrency: null,

			//validation rules
			rules: rules,

			//
			pneCodeSelect: [],

			//
			currencySelect: [],

		}

	},

	methods: {

		submit(){

			this.$http.post('/api/inventory/skus/sku', {
					
					part_number: this.partNumber,
					pne_code: this.pneCode,
					brand: this.brand,
					is_hazardous: this.isHazardous,
					has_expiration: this.hasExpiration,
					description: this.description,
					on_hand: this.onHand,
					available: this.available,
					reserved: this.reserved,
					on_order: this.onOrder,
					unserved: this.unserved,
					issued: this.issued,
					srp: this.srp,
					srp_currency: this.srpCurrency,
					cost: this.cost,
					cost_currency: this.costCurrency

				}, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('access_token')
					}
				}).then(function(response){
					
					console.log(response.data)
					router.push(window.history.back())

				})
				.catch(function(error){

					console.log(error)

				})

		},

		loadPneCodeSelect(){

			this.$http.get('/api/parts/pnes', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('access_token')
					}
				})
				.then(function(response){

					if(response.data !== undefined){
						for(let item of response.data.data){
							this.pneCodeSelect.push(item)
						}
					}

				})
				.catch(function(error){

					console.log(error)

				})

		},

		loadCurrencySelect(){

			this.$http.get('/api/config/currencies', {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('access_token')
					}
				})
				.then(function(response){

					if(response.data !== undefined){
						for(let item of response.data.data){
							this.currencySelect.push(item)
						}
					}

				})
				.catch(function(error){

					console.log(error)

				})

		},

		back(){
			router.go(window.history.back())
		}

	},

	created() {

		this.loadPneCodeSelect()
		this.loadCurrencySelect()

	}

}
</script>