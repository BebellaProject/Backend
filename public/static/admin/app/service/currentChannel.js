Bebella.service('CurrentChannel', ['Channel',
    function (Channel) {
        var service = this;
        
        var _channel = new Channel();
        
        service.get = function () {
            return _channel;
        };
        
        service.clear = function () {
            _channel = new Channel();
        };
        
    }
]);


