Bebella.service('CurrentCategory', ['Category',
    function (Category) {
        var service = this;
        
        var _category = new Category();
        
        service.get = function () {
            return _category;
        };
        
        service.clear = function () {
            _category = new Category();
        };
        
    }
]);
