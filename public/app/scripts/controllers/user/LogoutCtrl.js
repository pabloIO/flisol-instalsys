(function(){
	"use strict";
	angular.module('flisolApp')
    .controller('LogoutCtrl', ['$state', '$timeout', 'Auth', LogoutCtrl]);
	function LogoutCtrl($state, $timeout, Auth){
		var vm = this;
		// Props
    // Method
    vm.logout = logout;
    // Method implementation
    function logout(){
        Auth.logout();
    }
	}
})();
