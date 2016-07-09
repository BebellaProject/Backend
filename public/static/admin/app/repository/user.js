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
        
        repository.save = function (user) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(user);
            
            $http.post(api_v1("user/save"), data).then(
                function (res) {
                    user.id = res.data.id;
                    
                    deferred.resolve(user);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("user/all")).then(
                function (res) {
                    var users = _.map(res.data, function (json) {
                        var user = new User();
                        
                        attr(user, json);
                        
                        return user;
                    });
                    
                    deferred.resolve(users);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);
