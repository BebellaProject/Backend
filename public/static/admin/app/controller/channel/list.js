Bebella.controller('ChannelListCtrl', ['$scope', 'ChannelRepository',
    function ($scope, ChannelRepository) {
        
        ChannelRepository.all().then(
            function onSuccess (list) {
                $scope.channels = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de canais");
            }
        );
        
    }
]);
