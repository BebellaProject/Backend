Bebella.controller('StoreNewCtrl', ['$scope', 'CurrentStore', 'StoreRepository',
    function ($scope, CurrentStore, StoreRepository) {
        
        $scope.store = CurrentStore.get();
        
        $scope.create = function () {
            StoreRepository.save($scope.store).then(
                function onSuccess (store) {
                    alert(store.id);
                    alert("Loja cadastrada com sucesso");
                },
                function onError (res) {
                    alert("Houve um erro ao cadastrar a loja.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentStore.clear();
            $scope.store = CurrentStore.get();
        };
        
    }
]);

