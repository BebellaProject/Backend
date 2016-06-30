var Bebella = angular.module('Bebella', ['ui.router', 'datatables']);

var APP_URL = $("#APP_URL").val();

function view(path) {
    return APP_URL + '/admin/' + path;
}

function api_v1(path) {
    return APP_URL + '/api/v1/' + path;
}

function attr(dest, src) {
    for (var e in src) {
        if (e == "created_at" || e == "updated_at") {
            dest[e] = new Date(src[e]);
        } else if (e.startsWith("has_") || e.startsWith("is_") || e.startsWith("used_for_") || e == "active") {
            dest[e] = (src[e] === 1);
        } else {
            dest[e] = src[e];
        }
    }
}

Bebella.run([
    function () {
        
    }
]);