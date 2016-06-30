Bebella.service('CategoryRepository', ['$http', '$q', 'Category',
    function ($http, $q, Category) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('category/find/' + id)).then(
                function (res) {
                    var category = new Category();
                    
                    attr(category, res.data);
                    
                    deferred.resolve(category);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("category/all")).then(
                function (res) {
                    var categories = _.map(res.data, function (json) {
                        var category = new Category();
                        
                        attr(category, json);
                        
                        return category;
                    });
                    
                    deferred.resolve(categories);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (category) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(category);
            
            $http.post(api_v1("category/edit"), data).then(
                 function (res) {
                     deferred.resolve(category);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (category) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(category);
            
            $http.post(api_v1("category/save"), data).then(
                function (res) {
                    category.id = res.data.id;
                    
                    deferred.resolve(category);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);

