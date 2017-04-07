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
						    Create Brand
						    </v-toolbar-title>
						    <v-spacer />
						    <v-btn v-on:click.native="submit()" icon floating class="primary white--text">
								<v-icon>done</v-icon>
							</v-btn>
					 	 </v-toolbar>
					</v-card-row>
						
					<v-subheader>Brand Details</v-subheader>
					<v-card-row>
						<v-container fluid>
							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="brandName" label="Brand name" required></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="brandDesc" label="Brand Description"></v-text-field>
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

			//Brand name textfield
			brandName: null,
			
			//Brand description textfield
			brandDesc: null,

			rules: rules

		}

	},

	methods: {

		submit(){

			this.$http.post('/api/parts/brands/brand', {
					
					name: this.brandName,
					description: this.brandDesc

				}, {
					headers: {
						'Authorization': 'Bearer ' + localStorage.getItem('access_token')
					}
				}).then(function(response){
					
					console.log(response.data) 

				})
				.catch(function(error){

					console.log(error)

				})

		},

		back(){
			router.go(window.history.back())
		}

	}

}
</script>