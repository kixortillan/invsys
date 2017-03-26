<style scoped>
	label {
		padding: 10px 14px;
		border: 1px solid;
		cursor: pointer;
		box-shadow: 0 1px 2px rgba(10, 10, 10, 0.1);
		color: #fff;
	    background-color: #00d1b2;
    	border-color: transparent;
    	border-radius: 3px;
    	height: auto;
	}

	label:hover {
	    background-color: #00c4a7;
		border-color: transparent;
		color: #fff;
	}

	input[type=file]:focus + label{
	    border-color: transparent;
    	box-shadow: 0 0 0.5em rgba(0, 209, 178, 0.25);
    	color: #fff;
	    outline: 1px dotted #000;
	}

	i.fa-upload {
		padding: 3px;
	}

	input[type=file] {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
</style>

<template>
	<span>
		<input type="file" :name="name" :id="name" :multiple="isMultiple">
		<label :for="name">
			<i class="fa fa-upload"></i>
			<span>{{ text }}</span>
		</label>
	</span>
</template>

<script>
	export default {
		data() {
			return {

			}
		},

		props: {
			text: {
				type: String,
				default: 'Choose a file...'
			},
			name: {
				type: String,
				required: true
			},
			isMultiple: {
				type: Boolean,
				default: false
			}
		},

		methods: {

		}
	}
</script>