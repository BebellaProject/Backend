var Bebella = angular.module('Bebella', ['ui.router', 'datatables', 'angular-flot', 'ngStorage']);

var APP_URL = $("#APP_URL").val();
var API_TOKEN = $("#API_TOKEN").val();

function view(path) {
    return APP_URL + '/channel/' + path;
}

function api_v1(path, token) {
    return APP_URL + '/api/v1/' + path + '?api_token=' + API_TOKEN;
}

function attr(dest, src) {
    for (var e in src) {
        if (e == "created_at" || e == "updated_at") {
            dest[e] = new Date(src[e]);
        } else if (e.startsWith("has_") || e.startsWith("is_") || e.startsWith("used_for_") || e == "active") {
            dest[e] = (src[e] == 1);
        } else {
            dest[e] = src[e];
        }
    }
}

Bebella.run([
    function () {
    }
]);

Bebella.factory('Product', [
    function () {
        var Product = new Function();
        
        return Product;
    }
]);



Bebella.factory('Recipe', [
    function () {
        var Recipe = function () {
            this.tags = new Array();
            this.steps = new Array();
            this.products = new Array();
            this.comments = new Array();
            this.related = new Array();
        };
        
        return Recipe;
    }
]);




Bebella.service('ProductRepository', ['$http', '$q', 'Product',
    function ($http, $q, Product) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('product/find/' + id)).then(
                function (res) {
                    var product = new Product();
                    
                    attr(product, res.data);
                    
                    deferred.resolve(product);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.groupByCategory = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("product/groupByCategory")).then(
                function (res) {
                    var categories = _.map(res.data, function (json) {
                        var products = _.map(json, function (e) {
                            var product = new Product();
                            
                            attr(product, e);
                            
                            return product;
                        });
                        
                        return products;
                    });
                    
                    deferred.resolve(categories);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("product/all")).then(
                function (res) {
                    var products = _.map(res.data, function (json) {
                        var product = new Product();
                        
                        attr(product, json);
                        
                        return product;
                    });
                    
                    deferred.resolve(products);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (product) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product);
            
            $http.post(api_v1("product/edit"), data).then(
                 function (res) {
                     deferred.resolve(product);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (product) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product);
            
            $http.post(api_v1("product/save"), data).then(
                function (res) {
                    product.id = res.data.id;
                    
                    deferred.resolve(product);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);

Bebella.controller('ProfileIndexCtrl', ['$scope',
    function ($scope) {
        
    }
]);


Bebella.controller('StatsIndexCtrl', ['$scope',
    function ($scope) {
        
    }
]);


Bebella.controller('HomeIndexCtrl', ['$scope',
    function ($scope) {
        
    }
]);


Bebella.controller('RecipeListCtrl', ['$scope',
    function ($scope) {
        
    }
]);


Bebella.controller('RecipeNewCtrl', ['$scope', 'Recipe', 'ProductRepository',
    function ($scope, Recipe, ProductRepository) {
        
        $scope.recipe = new Recipe();
        
        function formatedUrl() {
            if ( ! $scope.videoUrl) return undefined;
            var regex = new RegExp("[?&]v(=([^&#]*)|&|#|$)"),
                results = regex.exec($scope.videoUrl);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        };
        
        function getTags() {
            return $scope.tags.trim().split(",");
        };
        
        $scope.addProduct = function() {
            if ( ! $scope.selectedProduct) {
                alert("Selecione um produto.");
            }
            
            ProductRepository.find($scope.selectedProduct).then(
                function onSuccess (product) {
                    $scope.recipe.products.push(product);
                },
                function onError (res) {
                    alert("Houve um erro na obtenção do produto selecionado");
                }
            );
        };
        
        $scope.insertImageStep = function () {
            var step = {
                type: "image"
            };
            
            $scope.recipe.steps.push(step);
        };
        
        $scope.insertMomentStep = function () {
            var step = {
                type: "moment"
            };
            
            $scope.recipe.steps.push(step);
        };
        
        $scope.moveStep = function (from, to) {
            var aux = $scope.recipe.steps[to];
            
            $scope.recipe.steps[to] = $scope.recipe.steps[from]; 
            $scope.recipe.steps[from] = aux;
        };
        
        $scope.removeStep = function (index) {
            $scope.recipe.steps.splice(index, 1);
        };
        
        $scope.create = function () {
            if ($scope.recipe.has_video) {
                var url = formatedUrl();
                
                if ( ! url || url === "") {
                    return alert("Url não informada ou incorreta.");
                }
                
                $scope.recipe.video_id = url;
            }
            
            $scope.recipe.tags = getTags();
            
            if ($scope.recipe.tags.length > 10) {
                return alert("Número de tags acima do limite definido.");
            }
            
        };
        
        ProductRepository.groupByCategory().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Erro ao obter a lista de produtos agrupados por categoria");
            }
        );
        
    }
]);


Bebella.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                
                reader.onload = function (loadEvent) {
                    scope.$apply(function () {
                        scope.fileread = loadEvent.target.result;
                    });
                };
                
                reader.readAsDataURL(changeEvent.target.files[0]);
            });
        }
    };
}]);


Bebella.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/dashboard/profile');
        
        $stateProvider
                
                .state('recipes', {
                    url: '/recipe/list',
                    views: {
                        Content: {
                            controller: 'RecipeListCtrl',
                            templateUrl: view('recipe/list')
                        }
                    }
                })
                
                .state('new_recipe', {
                    url: '/recipe/new',
                    views: {
                        Content: {
                            controller: 'RecipeNewCtrl',
                            templateUrl: view('recipe/new')
                        }
                    }
                })
                
                .state('dashboard', {
                    url: '/dashboard',
                    views: {
                        Content: {
                            controller: 'HomeIndexCtrl',
                            templateUrl: view('dashboard')
                        }
                    }
                })
                
                .state('dashboard.profile', {
                    url: '/profile',
                    views: {
                        SubContent: {
                            controller: 'ProfileIndexCtrl',
                            templateUrl: view('profile')
                        }
                    }
                })
                
                .state('dashboard.stats', {
                    url: '/stats',
                    views: {
                        SubContent: {
                            controller: 'StatsIndexCtrl',
                            templateUrl: view('stats')
                        }
                    }
                })
        
    }
]);