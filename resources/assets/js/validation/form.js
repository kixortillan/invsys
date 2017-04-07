export default {

	/**
	 * Validates that value is not empty, null or undefined.
	 * @param  {mixed} val    value being validated.
	 * @param  {String} errMsg optional error message to be returned.
	 * @return {mixed}        returns true if valid, else return the error message.
	 */
	// required: (val, errMsg = 'This field is required.') => {
	// 	console.log(val);
	// 	if(val === '' || 
	// 		val === null || 
	// 		val === undefined){
	// 		return errMsg;
	// 	}

	// 	return true;
	// },

	//Alphabetic validation
	alpha: (val, errMsg = 'This field only accepts alphabets.') => {

		if( /[^a-zA-Z]/.test(val) ) {
			return errMsg;
		}

		return true;
	},

	//Alphanumeric validation
	alphaNum: (val, errMsg = 'This field only accepts alphabets and numbers.') => {

		if( /[^a-zA-Z0-9]/.test(val) ) {
			return errMsg;
		}

		return true;
	},

	//Alphanumeric validation
	alphaDash: (val, errMsg = 'This field only accepts alphabets, numbers, hyphen and underscore') => {

		if( /[^a-zA-Z0-9\-\_]/.test(val) ) {
			return errMsg;
		}

		return true;	

	},

	email: (val, errMsg = 'This is not a valid email.') => {

		if(val === null || val === undefined){
			return false;
		}


		if( val.indexOf('@') === -1 ) {
			return errMsg;
		}

		return true;	

	},

	numeric: (val, errMsg = 'This field only accepts numbers.') => {

		if( /^\d*$/.test(val) ) {
			return errMsg;
		}

		return true;
	},

	positiveOnly: () => {

		if( /^\d*$/.test(val) ) {
			return errMsg;
		}

		return true;

	},

	negativeOnly: () => {

		if( /^\d*$/.test(val) ) {
			return errMsg;
		}

		return true;

	}

}