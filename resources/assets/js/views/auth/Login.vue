<template>
	
	<v-container fluid>

		<v-row>
			
			<v-col xs4></v-col>

			<v-col xs4>
				
				<v-card>
				
					<v-card-row>	
						<v-toolbar>
							    <v-toolbar-title class="white--text">Login</v-toolbar-title>
							    <v-spacer></v-spacer>
					 	</v-toolbar>
				 	</v-card-row>

					<v-card-text>
						<v-card-row>
							<v-text-field v-model="email" label="Email Address" :rules="[rules.email]" required></v-text-field>
						</v-card-row>

						<v-card-row>
							<v-text-field v-model="password" type="password" label="Password" required></v-text-field>
						</v-card-row>

						<v-card-row>
							<v-btn primary block v-on:click.native="login()">Login</v-btn>
						</v-card-row>

						<v-card-row class="text-xs-right">
							<router-link :to="{ path: '/register' }">
				 	 		Sign up
				 	 		</router-link>
							<v-spacer></v-spacer>
				 	 		<router-link :to="{ path: '/password/reset' }">
				 	 		Forgot You Password?
				 	 		</router-link>
				 	 	</v-card-row>
					</v-card-text>

				</v-card>

			</v-col>

			<v-col xs4></v-col>

		</v-row>

	</v-container>

</template>

<script>
	import rules from '../../validation/form'

	export default {

		data() {
			return {
				
				email: null,

				password: null,

				rules: rules,

			}
		},

		methods: {
			
			login(){
				this.$http.post("/api/login", {
					username: this.email,
					password: this.password,
				}).then((response) => {

					//do something with response
					//console.log(response)
					if(response.data !== undefined){
						localStorage.setItem('access_token', response.data.access_token)
						localStorage.setItem('refresh_token', response.data.refresh_token)
						localStorage.setItem('token_expire', response.data.expires_in)
						//router.push("/home")
						location.href = "/home"
					}

				}, (error) => {

					console.log(error)

				});
			}

		}

	}

</script>