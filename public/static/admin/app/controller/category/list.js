Bebella.controller('CategoryListCtrl', ['$scope', 'CategoryRepository',
    function ($scope, CategoryRepository) {
        
        CategoryRepository.all().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de categorias");
            }
        );
        
    }
]);
