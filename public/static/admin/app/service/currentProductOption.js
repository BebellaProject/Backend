Bebella.service('CurrentProductOption', ['ProductOption',
    function (ProductOption) {
        var service = this;
        
        var _product_option = new ProductOption();
        
        service.get = function () {
            return _product_option;
        };
        
        service.clear = function () {
            _product_option = new ProductOption();
        };
        
    }
]);


