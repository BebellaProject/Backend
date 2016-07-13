Bebella.controller('RecipeNewCtrl', ['$scope', 'Recipe',
    function ($scope, Recipe) {
        
        $scope.recipe = new Recipe();
        
    }
]);
