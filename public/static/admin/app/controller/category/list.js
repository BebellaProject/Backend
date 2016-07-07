Bebella.controller('CategoryListCtrl', ['$scope', 'CategoryRepository', 'Breadcumb',
    function ($scope, CategoryRepository, Breadcumb) {
        
        Breadcumb.title = 'Categorias';
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {text: 'Lista'}
        ];
        
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
