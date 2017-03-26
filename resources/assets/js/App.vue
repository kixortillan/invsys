<template>
	<v-app id="" top-toolbar sidebar-under-toolbar>
		<v-toolbar>
			
			<v-toolbar-side-icon @click.native.stop="sidebar = !sidebar"></v-toolbar-side-icon>
			
			<v-toolbar-title class="hidden-sm-and-down">{{ brand }}</v-toolbar-title>
			
			<v-spacer></v-spacer>
			
			<v-toolbar-items>

				<v-btn icon dark>
					<v-icon>account_circle</v-icon>
				</v-btn>
			<!-- <v-btn icon dark>
				<v-icon>favorite</v-icon>
			</v-btn> -->
				<v-menu bottom origin="top right" transition="v-scale-transition">
					<v-btn icon dark slot="activator">
						<v-icon>more_vert</v-icon>
					</v-btn>
					<v-list>
						<v-list-item>
							<v-list-tile>
								<v-list-tile-title>
									<form>
										<v-button>Log Out</v-button>
									</form>
								</v-list-tile-title>
							</v-list-tile>
						</v-list-item>
					</v-list>
				</v-menu>				

			</v-toolbar-items>

		</v-toolbar>

		<!-- <v-alert success v-bind:value="true" class="ma-0">{{ alertText }}</v-alert> -->

		<main>
			
			<v-sidebar left fixed drawer v-model="sidebar">
				<v-list>
					<v-list-item v-for="route in routes">
						<v-list-tile>
							<v-list-tile-title>
								<router-link :to="{ path: route.path }" class="white--text">
								{{ route.text }}
								</router-link>
							</v-list-tile-title>
						</v-list-tile>
					</v-list-item>
				</v-list>
			</v-sidebar>

			<v-content class="secondary z-depth-0">
				<router-view></router-view>
			</v-content>

		</main>
  		<v-footer>
  			<div class="text-xs-right">© 2016</div>
  		</v-footer>
	</v-app>
</template>

<script>
export default {
	data() {
		return {
			sidebar: false,
			alertText: '',
		}
	},

	props: {
		routes: {
			required: true
		},
		brand: {
			datatype: String,
			required: true
		}
	}
}
</script>