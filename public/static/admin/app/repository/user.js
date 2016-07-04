Bebella.service('UserRepository', ['$http', '$q', 'User',
    function ($http, $q, User) {
        var repository = this;
        
        repository.auth = function () {
            var deferred = $q.defer();
            
            $http.get(APP_URL + '/auth/user').then(
                function (res) {
                    var user = new User();
                    
                    attr(user, res.data);
                    
                    deferred.resolve(user);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);
