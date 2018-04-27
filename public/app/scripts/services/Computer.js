(function(){
  angular.module('flisolApp')
    .factory('Computer', ['$http', 'PUBLIC_URL', 'AUTH_URL', Computer]);
  function Computer($http, PUBLIC_URL, AUTH_URL){
    return{
      uploadRegistry: function(data){
          var promise = $http({
            method: 'POST',
            url: AUTH_URL + 'computer',
            data: data,
          }).then(function(response){
              return response.data;
          });
          return promise;
      },
    };
  }
})();
