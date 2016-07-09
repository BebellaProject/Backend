Bebella.controller('UserNewCtrl', ['$scope', 'Breadcumb', 'CurrentUser', 'UserRepository',
    function ($scope, Breadcumb, CurrentUser, UserRepository) {
        
        Breadcumb.title = 'Novo Usuário';
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {text: 'Formulário de Cadastro'}
        ];
        
        $scope.user = CurrentUser.get();
        
        $scope.create = function () {
            UserRepository.save($scope.user).then(
                function onSuccess (user) {
                    alert(user.id);
                    alert("Novo Usuário criado com sucesso");
                },
                function onError (res) {
                    alert("Erro ao criar novo usuário");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentUser.clear();
            $scope.user = CurrentUser.get();
        };
    }
]);

