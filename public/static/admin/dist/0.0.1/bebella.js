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

Bebella.controller('CategoryListCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Category List";
    }
]);


Bebella.controller('CategoryNewCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Category New";
    }
]);



Bebella.controller('ChannelListCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Channel List";
    }
]);


Bebella.controller('ChannelNewCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Channel New";
    }
]);



Bebella.controller('ProductOptionListCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Product Option List";
    }
]);


Bebella.controller('ProductOptionNewCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Product Option New";
    }
]);



Bebella.controller('ProductListCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Product List";
    }
]);


Bebella.controller('ProductNewCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Product New";
    }
]);



Bebella.controller('RecipeListCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Recipe List";
    }
]);


Bebella.controller('RecipeNewCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Recipe New";
    }
]);



Bebella.controller('UserListCtrl', ['$scope',
    function ($scope) {
        $scope.test = "User List";
    }
]);


Bebella.controller('UserNewCtrl', ['$scope',
    function ($scope) {
        $scope.test = "User New";
    }
]);



Bebella.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/');
        
        $stateProvider
        
                .state('user_new', {
                    url: '/user/new',
                    views: {
                        MainContent: {
                            templateUrl: view('user/new')
                        }
                    }
                })
                
                .state('user_list', {
                    url: '/user/list',
                    views: {
                        MainContent: {
                            templateUrl: view('user/list')
                        }
                    }
                })

                .state('recipe_new', {
                    url: '/recipe/new',
                    views: {
                        MainContent: {
                            templateUrl: view('recipe/new')
                        }
                    }
                })
                
                .state('recipe_list', {
                    url: '/recipe/list',
                    views: {
                        MainContent: {
                            templateUrl: view('recipe/list')
                        }
                    }
                })
                
                .state('category_new', {
                    url: '/category/new',
                    views: {
                        MainContent: {
                            templateUrl: view('category/new')
                        }
                    }
                })
                
                .state('category_list', {
                    url: '/category/list',
                    views: {
                        MainContent: {
                            templateUrl: view('category/list')
                        }
                    }
                })
                
                .state('channel_new', {
                    url: '/channel/new',
                    views: {
                        MainContent: {
                            templateUrl: view('channel/new')
                        }
                    }
                })
                
                .state('channel_list', {
                    url: '/channel/list',
                    views: {
                        MainContent: {
                            templateUrl: view('channel/list')
                        }
                    }
                })
                
                .state('product_new', {
                    url: '/product/new',
                    views: {
                        MainContent: {
                            templateUrl: view('product/new')
                        }
                    }
                })
                
                .state('product_list', {
                    url: '/product/list',
                    views: {
                        MainContent: {
                            templateUrl: view('product/list')
                        }
                    }
                })
                
                .state('product_option_new', {
                    url: '/product_option/new',
                    views: {
                        MainContent: {
                            templateUrl: view('product_option/new')
                        }
                    }
                })
                
                .state('product_option_list', {
                    url: '/product_option/list',
                    views: {
                        MainContent: {
                            templateUrl: view('product_option/list')
                        }
                    }
                })
        
                .state('home', {
                    url: '/',
                    views: {
                        MainContent: {
                            templateUrl: view('dashboard')
                        }
                    }
                });
        
    }
]);