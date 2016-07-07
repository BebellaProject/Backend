Bebella.service('CurrentStore', ['Store',
    function (Store) {
        var service = this;
        
        var _store = new Store();
        
        service.get = function () {
            return _store;
        };
        
        service.clear = function () {
            _store = new Store();
        };
        
    }
]);


