Bebella.controller('RecipeNewCtrl', ['$scope', 'ChannelRepository', 'RecipeRepository', 'ProductRepository', 'CurrentRecipe',
    function ($scope, ChannelRepository, RecipeRepository, ProductRepository, CurrentRecipe) {
        
        $scope.recipe = CurrentRecipe.get();
        
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
        
        
        $scope.create = function () {
            RecipeRepository.save($scope.recipe).then(
                function (recipe) {
                    alert(recipe.id);
                    alert("Nova receita criada com sucesso.");
                },
                function (res) {
                    alert("Houve um erro na criação desta receita.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentRecipe.clear();
            $scope.recipe = CurrentRecipe.get();
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

