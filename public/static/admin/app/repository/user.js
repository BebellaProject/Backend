Bebella.service('UserRepository', ['$http', '$q', 'User',
    function ($http, $q, User) {
        var repository = this;
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("user/all")).then(
                function (res) {
                    
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);
