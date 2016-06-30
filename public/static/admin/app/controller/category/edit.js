Bebella.controller('CategoryEditCtrl', ['$scope', '$stateParams', 'CategoryRepository',
    function ($scope, $stateParams, CategoryRepository) {
    
        $scope.edit = function () {
            CategoryRepository.edit($scope.category).then(
                function onSuccess (category) {
                    alert("Categoria editada com sucesso.");
                },
                function onError (res) {
                    alert("Erro ao criar esta categoria.");
                }
            );
        };
        
        CategoryRepository.find($stateParams.categoryId).then(
            function onSuccess (category) {
                $scope.category = category;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos dados desta categoria");
            }
        );
        
    }
]);


