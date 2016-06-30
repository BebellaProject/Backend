Bebella.service('ProductRepository', ['$http', '$q', 'Product',
    function ($http, $q, Product) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('product/find/' + id)).then(
                function (res) {
                    var product = new Product();
                    
                    attr(product, res.data);
                    
                    deferred.resolve(product);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("product/all")).then(
                function (res) {
                    var products = _.map(res.data, function (json) {
                        var product = new Product();
                        
                        attr(product, json);
                        
                        return product;
                    });
                    
                    deferred.resolve(products);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (product) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product);
            
            $http.post(api_v1("product/edit"), data).then(
                 function (res) {
                     deferred.resolve(product);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (product) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product);
            
            $http.post(api_v1("product/save"), data).then(
                function (res) {
                    product.id = res.data.id;
                    
                    deferred.resolve(product);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);


