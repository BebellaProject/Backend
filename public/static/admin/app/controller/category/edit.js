Bebella.controller('CategoryEditCtrl', ['$scope', 'Breadcumb', '$stateParams', 'CategoryRepository',
    function ($scope, Breadcumb, $stateParams, CategoryRepository) {
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'category_detail({categoryId: ' + $stateParams.categoryId + '})', text: 'Categoria'},
            {text: 'Formulário de Cadastro'}
        ];
        
    
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
                
                Breadcumb.title = category.name;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos dados desta categoria");
            }
        );
        
    }
]);


