(function(){
	'use strict';

	angular.module('flisolApp')
	.controller('DashboardUserCtrl', ['$state', '$timeout', 'Computer', 'Auth', DashboardUserCtrl]);

	function DashboardUserCtrl($state, $timeout, Computer, Auth){
		var vm = this;
    // Props
		vm.types = ['Laptop', 'Escritorio', 'Celular'];
		vm.upload = {
			fail: false,
			isLoading: false,
			msg: ''
		};
    vm.dataRegister = {
			person: {
				names: '',
				lastnames: '',
				email: '',
			},
			computer: {
				brand: '',
				ram: '',
				processor: '',
				actual_os: '',
				os_to_install: '',
				can_be_inst: true,
				type: 'Laptop',
				details: '',
			},
    };
		// Methods
		vm.uploadRegistry = uploadRegistry;
		// Definition
    function uploadRegistry(){
			vm.dataRegister['uid'] = Auth.getId();
			vm.upload.fail = false;
			vm.upload.isLoading = true;
			Computer.uploadRegistry(vm.dataRegister).then(function(data){
				vm.upload.isLoading = false;
				if(data.success){
					console.log(data);
					alert(data.msg);
					vm.dataRegister = {
						person: {
							names: '',
							lastnames: '',
							email: '',
						},
						computer: {
							brand: '',
							ram: '',
							processor: '',
							actual_os: '',
							os_to_install: '',
							can_be_inst: true,
							type: 'Laptop',
							details: '',
						},
			    };
				}else{
					vm.upload.isLoading = false;
					vm.upload.fail = true;
					vm.upload.msg = data.msg;
				}
			}, function(err){
				vm.upload.isLoading = false;
				vm.upload.fail = true;
				vm.upload.msg = 'Hubo un error al subir el registro, consulte a un técnico';
			});
		}

	};
})();
