Bebella.service('StoreRepository', ['$http', '$q', 'Store',
    function ($http, $q, Store) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('store/find/' + id)).then(
                function (res) {
                    var store = new Store();
                    
                    attr(store, res.data);
                    
                    deferred.resolve(store);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("store/all")).then(
                function (res) {
                    var stores = _.map(res.data, function (json) {
                        var store = new Store();
                        
                        attr(store, json);
                        
                        return store;
                    });
                    
                    deferred.resolve(stores);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (store) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(store);
            
            $http.post(api_v1("store/edit"), data).then(
                 function (res) {
                     deferred.resolve(store);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (store) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(store);
            
            $http.post(api_v1("store/save"), data).then(
                function (res) {
                    store.id = res.data.id;
                    
                    deferred.resolve(store);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);
