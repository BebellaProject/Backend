Bebella.service('ProductOptionRepository', ['$http', '$q', 'ProductOption',
    function ($http, $q, ProductOption) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('product_option/find/' + id)).then(
                function (res) {
                    var product_option = new ProductOption();
                    
                    attr(product_option, res.data);
                    
                    deferred.resolve(product_option);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.getStoreUrl = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('product_option/getStoreUrl/' + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("product_option/all")).then(
                function (res) {
                    var product_options = _.map(res.data, function (json) {
                        var product_option = new ProductOption();
                        
                        attr(product_option, json);
                        
                        return product_option;
                    });
                    
                    deferred.resolve(product_options);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (product_option) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product_option);
            
            $http.post(api_v1("product_option/edit"), data).then(
                 function (res) {
                     deferred.resolve(product_option);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (product_option) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product_option);
            
            $http.post(api_v1("product_option/save"), data).then(
                function (res) {
                    product_option.id = res.data.id;
                    
                    deferred.resolve(product_option);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);
