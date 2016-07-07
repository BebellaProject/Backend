Bebella.controller('CategoryNewCtrl', ['$scope', 'CurrentCategory', 'CategoryRepository', 'Breadcumb',
    function ($scope, CurrentCategory, CategoryRepository, Breadcumb) {
        
        Breadcumb.title = 'Nova Categoria';
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {text: 'Formulário de Cadastro'}
        ];
        
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

