(function(){
	"use strict";
	angular.module('flisolApp')
    .controller('LoginCtrl', ['$state', '$timeout', 'Auth', LoginCtrl]);
	function LoginCtrl($state, $timeout, Auth){
		var vm = this;
		// Props
		vm.creds = {
			names: "",
			lastnames: "",
			username: ""
		};
		vm.loginState = {
			isNotLogged: false,
			msg: "",
			isLoading: false
		};
		// Method
		vm.login = login;

		function login(){
			vm.loginState.isNotLogged = false;
			vm.loginState.isLoading = true;
			Auth.login(vm.creds).then(function(data){
				if(data.success){
				 	 Auth.setSession(data.id, data.token);
					 $state.go('user');
				}else{
					vm.loginState.isNotLogged = true;
					vm.loginState.isLoading = false;
					vm.loginState.msg = data.msg
				}
			}, function(err){
				vm.loginState.isNotLogged = true;
				vm.loginState.isLoading = false;
				vm.loginState.msg = 'Hubo un error al iniciar sesión, revise su conexión a internet e inténtelo nuevamente';
 			});
		};
	}
})();
