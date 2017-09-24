	var login = new Vue ({
	 el:'#app',
	 data: {
		phd_login_usuario: '',
		phd_login_pass: '',
	  },
	 methods: {
  		isFormValid () {
  			return this.phd_login_usuario !="" && this.phd_login_pass !="";
  		}
	  }
	});