Bebella.controller('RecipeEditCtrl', ['$scope', '$stateParams', '$timeout', 'RecipeRepository', 'ChannelRepository', 'ProductRepository',
    function ($scope, $stateParams, $timeout, RecipeRepository, ChannelRepository, ProductRepository) {
        
        ChannelRepository.all().then(
            function onSuccess (list) {
                $scope.channels = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de canais");
            }
        );
        
        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de produtos");
            }
        );
        
        RecipeRepository.find($stateParams.recipeId).then(
            function onSuccess (recipe) {
                $scope.recipe = recipe;
                console.log(recipe);
            },
            function onError (res) {
                alert("Houve um erro na obtenção da receita.");
            }
        );

        $scope.edit = function () {
            RecipeRepository.edit($scope.recipe).then(
                function onSuccess (recipe) {
                    alert("Receita editada com sucesso.");
                },
                function onError (res) {
                    alert("Erro ao editar receita");
                }
            );
        };
        
        $scope.newTag = function () {
            $scope.recipe.tags.push({});
        };
        
        $scope.removeTag = function () {
            $scope.recipe.tags.pop();
        };
        
        $scope.newStep = function () {
            $scope.recipe.steps.push({});
        };
        
        $scope.removeStep = function () {
            $scope.recipe.steps.pop();
        };
        
        $scope.newProduct = function () {
            $scope.recipe.products.push({});
        };
        
        $scope.removeProduct = function () {
            $scope.recipe.products.pop();
        };
        
    }
]);
