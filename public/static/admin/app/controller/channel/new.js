Bebella.controller('ChannelNewCtrl', ['$scope', 'CurrentChannel', 'ChannelRepository',
    function ($scope, CurrentChannel, ChannelRepository) {
        
        $scope.channel = CurrentChannel.get();
        
        $scope.create = function () {
            ChannelRepository.save($scope.channel).then(
                function onSuccess (channel) {
                    alert(channel.id);
                    alert("Canal cadastrado com sucesso.");
                },
                function onError (res) {
                    alert("Houve um erro no cadasto deste canal.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentChannel.clear();
            $scope.channel = CurrentChannel.get();
        };
        
    }
]);

