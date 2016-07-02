Bebella.service('CurrentRecipe', ['Recipe',
    function (Recipe) {
        var service = this;
        
        var _recipe = new Recipe();
        
        service.get = function () {
            return _recipe;
        };
        
        service.clear = function () {
            _recipe = new Recipe();
        };
        
    }
]);


