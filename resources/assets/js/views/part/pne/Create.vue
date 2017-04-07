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
						    Create Part Number Extension
						    </v-toolbar-title>
						    <v-spacer />
						    <v-btn v-on:click.native="submit()" icon floating class="primary white--text">
								<v-icon>done</v-icon>
							</v-btn>
					 	 </v-toolbar>
					</v-card-row>
						
					<v-subheader>PNE Details</v-subheader>
					<v-card-row>
						<v-container fluid>
							<v-row>
								<v-col sm1></v-col>
								<v-col sm5>
									<v-text-field v-model="partNumExt" label="Part # Extension" required :rules="validation.invoiceNum"></v-text-field>
								</v-col>
								<v-col sm5>
									<v-text-field v-model="desc" label="Description"></v-text-field>
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
import Validation from '../../../validation/form'


export default {

	data() {

		return {

			//Part Number Extension textfield
			partNumExt: null,
			
			//Description textfield
			desc: null,

			//
			validation: {
				
				//
				partNumExt: [
					
					() => {
						if(this.partNumExt == null){
							return true
						}

						if(Validation.isEmpty(this.partNumExt)){
							return 'This field is required.'
						}

						return true;
					},

					() => {
						if(!Validation.alphaDash(this.partNumExt)){
							return 'This field must contain alphanumeric, hyphen, or underscore only.';
						}

						return true;
					}

				]

			}

		}

	},

	methods: {

		submit(){

			this.$http.post('/api/parts/pnes/pne', {
					
					pne_code: this.partNumExt,
					description: this.desc

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