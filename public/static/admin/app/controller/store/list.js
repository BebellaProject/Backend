Bebella.controller('StoreListCtrl', ['$scope', 'StoreRepository',
    function ($scope, StoreRepository) {
    
        StoreRepository.all().then(
            function onSuccess (list) {
                $scope.stores = list;
            },
            function onError (res) {
                alert("Erro ao obter a lista de lojas.");
            }
        );
    
    }
]);
