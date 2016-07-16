Bebella.controller('RecipeNewCtrl', ['$scope', 'Recipe', 'ProductRepository', 'RecipeRepository',
    function ($scope, Recipe, ProductRepository, RecipeRepository) {
        
        $scope.recipe = new Recipe();
        
        function formatedUrl() {
            if ( ! $scope.videoUrl) return undefined;
            var regex = new RegExp("[?&]v(=([^&#]*)|&|#|$)"),
                results = regex.exec($scope.videoUrl);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        };
        
        function getTags() {
            return $scope.tags.trim().split(",");
        };
        
        $scope.addProduct = function() {
            if ( ! $scope.selectedProduct) {
                alert("Selecione um produto.");
            }
            
            if ($scope.selectedProduct != "-1") {
                ProductRepository.find($scope.selectedProduct).then(
                    function onSuccess (product) {
                        product.exists = true;
                        
                        $scope.recipe.products.push(product);
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção do produto selecionado");
                    }
                );    
            } else {
                $scope.recipe.products.push({
                    exists: false,
                    name: $scope.newProductName,
                    desc: $scope.newProductDesc
                });
            }
        };
        
        $scope.insertImageStep = function () {
            var step = {
                type: "image"
            };
            
            $scope.recipe.steps.push(step);
        };
        
        $scope.insertMomentStep = function () {
            var step = {
                type: "moment"
            };
            
            $scope.recipe.steps.push(step);
        };
        
        $scope.moveStep = function (from, to) {
            var aux = $scope.recipe.steps[to];
            
            $scope.recipe.steps[to] = $scope.recipe.steps[from]; 
            $scope.recipe.steps[from] = aux;
        };
        
        $scope.removeStep = function (index) {
            $scope.recipe.steps.splice(index, 1);
        };
        
        $scope.create = function () {
            if ($scope.recipe.has_video) {
                var url = formatedUrl();
                
                if ( ! url || url === "") {
                    return alert("Url não informada ou incorreta.");
                }
                
                $scope.recipe.video_id = url;
            }
            
            $scope.recipe.tags = getTags();
            
            if ($scope.recipe.tags.length > 10) {
                return alert("Número de tags acima do limite definido.");
            }
            
            RecipeRepository.sendForApproval($scope.recipe).then(
                function onSuccess (msg) {
                    alert(msg);
                },
                function onError (res) {
                    alert("Houve um erro no envio da receita.");
                }
            );
        };
        
        ProductRepository.groupByCategory().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Erro ao obter a lista de produtos agrupados por categoria");
            }
        );
        
    }
]);
