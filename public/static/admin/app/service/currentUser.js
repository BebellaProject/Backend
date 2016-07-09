Bebella.service('CurrentUser', ['User',
    function (User) {
        var service = this;
        
        var _user = new User();
        
        service.get = function () {
            return _user;
        };
        
        service.clear = function () {
            _user = new User();
        };
        
    }
]);



