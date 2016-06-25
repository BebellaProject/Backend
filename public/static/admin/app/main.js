var Bebella = angular.module('Bebella', ['ui.router']);

var APP_URL = $("#APP_URL").val();

function view(path) {
    return APP_URL + '/admin/' + path;
}

function api_v1(path) {
    return APP_URL + '/api/v1/' + path;
}

Bebella.run([
    function () {
        
    }
]);