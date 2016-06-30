Bebella.service('CurrentProduct', ['Product',
    function (Product) {
        var service = this;
        
        var _product = new Product();
        
        service.get = function () {
            return _product;
        };
        
        service.clear = function () {
            _product = new Product();
        };
        
    }
]);

