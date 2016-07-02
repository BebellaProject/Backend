Bebella.controller('RecipeListCtrl', ['$scope', 'RecipeRepository',
    function ($scope, RecipeRepository) {
        
        RecipeRepository.all().then(
            function onSuccess (list) {
                $scope.recipes = list;
            },
            function onError (res) {
                alert("Erro ao carregar lista de receitas");
            } 
        );
        
    }
]);
