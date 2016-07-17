Bebella.controller('RecipeUnderApprovalListCtrl', ['$scope', 'RecipeRepository',
    function ($scope, RecipeRepository) {
        
        RecipeRepository.underApprovalList().then(
            function onSuccess(list) {
                $scope.recipes = list;
            },
            function onError(res) {
                alert("Houve um erro na obtenção da lista de receitas sob aprovação.");
            }
        );

    }
]);