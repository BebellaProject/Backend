Bebella.controller('UserListCtrl', ['$scope', 'UserRepository', 'Breadcumb',
    function ($scope, UserRepository, Breadcumb) {
        
        Breadcumb.title = 'Usuários';
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {text: 'Lista'}
        ];
        
        UserRepository.all().then(
            function onSuccess (list) {
                $scope.users = list;
            },
            function onError (res) {
                alert("Erro ao obter lista de usuários");
            }
        );
        
    }
]);
