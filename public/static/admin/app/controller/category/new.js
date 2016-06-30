Bebella.controller('CategoryNewCtrl', ['$scope', 'CurrentCategory', 'CategoryRepository',
    function ($scope, CurrentCategory, CategoryRepository) {
        $scope.category = CurrentCategory.get();
    
        $scope.create = function () {
            CategoryRepository.save($scope.category).then(
                function onSuccess (category) {
                    alert("Categoria cadastrada com sucesso.");
                    CurrentCategory.clear();
                },
                function onError (res) {
                    alert("Erro ao criar esta categoria.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentCategory.clear();
            $scope.category = CurrentCategory.get();
        };
    }
]);

