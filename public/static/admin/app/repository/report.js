Bebella.service('ReportRepository', ['$http', '$q',
    function ($http, $q) {
        var repository = this;
        
        repository.redirectsByProductOption = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("report/redirectsByProductOption/" + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.clicksByProductOption = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("report/clicksByProductOption/" + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.viewsByProductOption = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("report/viewsByProductOption/" + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);

