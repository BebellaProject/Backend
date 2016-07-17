Bebella.service('CurrentRecipe', ['$q', '$localStorage', 'Recipe',
    function ($q, $localStorage, Recipe) {
        var service = this;
    
        service.get = function () {
            if (! $localStorage.current_recipe) {
                $localStorage.current_recipe = new Recipe();
            }
            
            return $localStorage.current_recipe;
        };
    
        service.clear = function () {
            $localStorage.current_recipe = new Recipe();
        };
    
    }
]);

