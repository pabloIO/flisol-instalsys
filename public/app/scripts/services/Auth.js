(function(){
	'use strict';
	angular.module('flisolApp')
		.factory('Auth',['$http', '$state', 'PUBLIC_URL', 'localStorageService', Auth]);
	function Auth($http, $state, PUBLIC_URL, localStorageService){
		return{
			setSession: function(uid, token){
				this.setId(uid);
				this.setToken(token);
			},
			setId: function(uid){
				return localStorageService.set('uid', uid);
			},
			setToken: function(token){
				return localStorageService.set('token', token);
			},
			getId: function(){
				return localStorageService.get('uid');
			},
			getToken: function(){
				return localStorageService.get('token');
			},
			isAuth: function(){
				if (this.getToken() == null)
					return false;
				else
					return this.getToken() != null;
			},
			login: function(data){
				var promise = $http({
					method: 'POST',
					url: PUBLIC_URL + 'login',
					data: data
				}).then(function(response){
					return response.data;
				});
				return promise;
			},
			logout: function(){
				$state.go('home');
				localStorageService.clearAll();
			},
		};
	};
})();
