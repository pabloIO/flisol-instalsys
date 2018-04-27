'use strict';
angular.module('flisolApp', [
	'ui.router',
	// 'ngTouch',
	'LocalStorageModule'
])
.constant('PUBLIC_URL', 'http://localhost:8000/api/v1/')
.constant('AUTH_URL', 'http://localhost:8000/api/v1/auth/')
.config(function (localStorageServiceProvider) {
  localStorageServiceProvider
    .setPrefix('flisolApp');
})
.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider){
	$stateProvider
		/**
		 *######### PUBLIC STATES ##########
		 */
		.state('home',{
			url: '/',
			views: {
				'header': {
					templateUrl: '/app/views/public/header.html',
				},
				'content': {
					templateUrl: '/app/views/public/home.html',
					controller: 'LoginCtrl as vm'
				},
				'footer': {
					templateUrl: '/app/views/public/footer.html'
				},
			}
		})
		/**
		 *########## AUTH STATES #########
		 *
		 * USER STATES
		 */
		.state('user', {
			url: '/dashboard',
			views: {
				'user-header': {
					templateUrl: '/app/views/user/header.html',
					controller: 'LogoutCtrl as vm',
				},
				'user-content': {
					templateUrl: '/app/views/user/dashboard.html',
					controller: 'DashboardUserCtrl as vm'
				},
				'user-footer': {
					templateUrl: '/app/views/user/footer.html'
				},
			}
		})
	$urlRouterProvider.otherwise('/');
	$locationProvider.html5Mode(true);
}])
.run(["$transitions", "$state", "$window", function($transitions, $state, $window) {
  $transitions.onStart({to : 'user.**'}, function(trans){
    var $state = trans.router.stateService;
    var AuthService = trans.injector().get('Auth');
    if(!AuthService.isAuth()){
    	return $state.target('home');
    }
  });
  $transitions.onStart({to : 'home.**'}, function(trans){
    var $state = trans.router.stateService;
    var AuthService = trans.injector().get('Auth');
    if(AuthService.isAuth()){
    	return $state.target('user');
    }
  });
}]);
