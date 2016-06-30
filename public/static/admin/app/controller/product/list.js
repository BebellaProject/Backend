Bebella.controller('ProductListCtrl', ['$scope', 'ProductRepository',
    function ($scope, ProductRepository) {
        
        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de produtos.");
            }
        );
        
    }
]);
