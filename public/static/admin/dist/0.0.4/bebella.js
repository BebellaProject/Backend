var Bebella = angular.module('Bebella', ['ui.router', 'datatables', 'angular-flot']);

var APP_URL = $("#APP_URL").val();
var API_TOKEN = $("#API_TOKEN").val();

function view(path) {
    return APP_URL + '/admin/' + path;
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

Bebella.factory('Category', [
    function () {
        var Category = new Function();
        
        return Category;
    }
]);


Bebella.factory('Channel', [
    function () {
        var Channel = new Function();
        
        return Channel;
    }
]);



Bebella.factory('Product', [
    function () {
        var Product = new Function();
        
        return Product;
    }
]);



Bebella.factory('ProductOption', [
    function () {
        var ProductOption = new Function();
        
        return ProductOption;
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




Bebella.factory('Store', [
    function () {
        var Store = new Function();
        
        return Store;
    }
]);




Bebella.factory('User', [
    function () {
        var User = new Function();
        
        return User;
    }
]);


Bebella.service('Breadcumb', [
    function () {
        var service = this;
        
        service.title = "Teste";
        
        service.items = [];
    }
]);


Bebella.service('CurrentCategory', ['Category',
    function (Category) {
        var service = this;
        
        var _category = new Category();
        
        service.get = function () {
            return _category;
        };
        
        service.clear = function () {
            _category = new Category();
        };
        
    }
]);


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




Bebella.service('CurrentProduct', ['Product',
    function (Product) {
        var service = this;
        
        var _product = new Product();
        
        service.get = function () {
            return _product;
        };
        
        service.clear = function () {
            _product = new Product();
        };
        
    }
]);



Bebella.service('CurrentProductOption', ['ProductOption',
    function (ProductOption) {
        var service = this;
        
        var _product_option = new ProductOption();
        
        service.get = function () {
            return _product_option;
        };
        
        service.clear = function () {
            _product_option = new ProductOption();
        };
        
    }
]);




Bebella.service('CurrentRecipe', ['Recipe',
    function (Recipe) {
        var service = this;
        
        var _recipe = new Recipe();
        
        service.get = function () {
            return _recipe;
        };
        
        service.clear = function () {
            _recipe = new Recipe();
        };
        
    }
]);




Bebella.service('CurrentStore', ['Store',
    function (Store) {
        var service = this;
        
        var _store = new Store();
        
        service.get = function () {
            return _store;
        };
        
        service.clear = function () {
            _store = new Store();
        };
        
    }
]);




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





Bebella.service('CategoryRepository', ['$http', '$q', 'Category',
    function ($http, $q, Category) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('category/find/' + id)).then(
                function (res) {
                    var category = new Category();
                    
                    attr(category, res.data);
                    
                    deferred.resolve(category);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("category/all")).then(
                function (res) {
                    var categories = _.map(res.data, function (json) {
                        var category = new Category();
                        
                        attr(category, json);
                        
                        return category;
                    });
                    
                    deferred.resolve(categories);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (category) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(category);
            
            $http.post(api_v1("category/edit"), data).then(
                 function (res) {
                     deferred.resolve(category);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (category) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(category);
            
            $http.post(api_v1("category/save"), data).then(
                function (res) {
                    category.id = res.data.id;
                    
                    deferred.resolve(category);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);

Bebella.service('ChannelRepository', ['$http', '$q', 'Channel',
    function ($http, $q, Channel) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('channel/find/' + id)).then(
                function (res) {
                    var channel = new Channel();
                    
                    attr(channel, res.data);
                    
                    deferred.resolve(channel);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("channel/all")).then(
                function (res) {
                    var channels = _.map(res.data, function (json) {
                        var channel = new Channel();
                        
                        attr(channel, json);
                        
                        return channel;
                    });
                    
                    deferred.resolve(channels);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (channel) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(channel);
            
            $http.post(api_v1("channel/edit"), data).then(
                 function (res) {
                     deferred.resolve(channel);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (channel) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(channel);
            
            $http.post(api_v1("channel/save"), data).then(
                function (res) {
                    channel.id = res.data.id;
                    
                    deferred.resolve(channel);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
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

Bebella.service('ProductOptionRepository', ['$http', '$q', 'ProductOption',
    function ($http, $q, ProductOption) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('product_option/find/' + id)).then(
                function (res) {
                    var product_option = new ProductOption();
                    
                    attr(product_option, res.data);
                    
                    deferred.resolve(product_option);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.getStoreUrl = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('product_option/getStoreUrl/' + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("product_option/all")).then(
                function (res) {
                    var product_options = _.map(res.data, function (json) {
                        var product_option = new ProductOption();
                        
                        attr(product_option, json);
                        
                        return product_option;
                    });
                    
                    deferred.resolve(product_options);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (product_option) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product_option);
            
            $http.post(api_v1("product_option/edit"), data).then(
                 function (res) {
                     deferred.resolve(product_option);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (product_option) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(product_option);
            
            $http.post(api_v1("product_option/save"), data).then(
                function (res) {
                    product_option.id = res.data.id;
                    
                    deferred.resolve(product_option);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);


Bebella.service('RecipeRepository', ['$http', '$q', 'Recipe',
    function ($http, $q, Recipe) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('recipe/find/' + id)).then(
                function (res) {
                    var recipe = new Recipe();
                    
                    attr(recipe, res.data);
                    
                    deferred.resolve(recipe);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("recipe/all")).then(
                function (res) {
                    var recipes = _.map(res.data, function (json) {
                        var recipe = new Recipe();
                        
                        attr(recipe, json);
                        
                        return recipe;
                    });
                    
                    deferred.resolve(recipes);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (recipe) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(recipe);
            
            $http.post(api_v1("recipe/edit"), data).then(
                 function (res) {
                     deferred.resolve(recipe);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (recipe) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(recipe);
            
            $http.post(api_v1("recipe/save"), data).then(
                function (res) {
                    recipe.id = res.data.id;
                    
                    deferred.resolve(recipe);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);




Bebella.service('ReportRepository', ['$http', '$q',
    function ($http, $q) {
        var repository = this;
        
        repository.redirectsByProductOption = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("report/redirectsByProductOption/" + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.clicksByProductOption = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("report/clicksByProductOption/" + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.viewsByProductOption = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("report/viewsByProductOption/" + id)).then(
                function (res) {
                    deferred.resolve(res.data);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);



Bebella.service('StoreRepository', ['$http', '$q', 'Store',
    function ($http, $q, Store) {
        var repository = this;
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('store/find/' + id)).then(
                function (res) {
                    var store = new Store();
                    
                    attr(store, res.data);
                    
                    deferred.resolve(store);
                },
                function (res) {
                    deferred.reject(res);
                }
            );

            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("store/all")).then(
                function (res) {
                    var stores = _.map(res.data, function (json) {
                        var store = new Store();
                        
                        attr(store, json);
                        
                        return store;
                    });
                    
                    deferred.resolve(stores);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.edit = function (store) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(store);
            
            $http.post(api_v1("store/edit"), data).then(
                 function (res) {
                     deferred.resolve(store);
                 },
                 function (res) {
                     deferred.reject(res);
                 }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (store) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(store);
            
            $http.post(api_v1("store/save"), data).then(
                function (res) {
                    store.id = res.data.id;
                    
                    deferred.resolve(store);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);


Bebella.service('UserRepository', ['$http', '$q', 'User',
    function ($http, $q, User) {
        var repository = this;
        
        repository.auth = function () {
            var deferred = $q.defer();
            
            $http.get(APP_URL + '/auth/user').then(
                function (res) {
                    var user = new User();
                    
                    attr(user, res.data);
                    
                    deferred.resolve(user);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (user) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(user);
            
            $http.post(api_v1("user/save"), data).then(
                function (res) {
                    user.id = res.data.id;
                    
                    deferred.resolve(user);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.all = function () {
            var deferred = $q.defer();
            
            $http.get(api_v1("user/all")).then(
                function (res) {
                    var users = _.map(res.data, function (json) {
                        var user = new User();
                        
                        attr(user, json);
                        
                        return user;
                    });
                    
                    deferred.resolve(users);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
    }
]);


Bebella.controller('BreadcumbCtrl', ['$scope', 'Breadcumb',
    function ($scope, Breadcumb) {
        $scope.breadcumb = Breadcumb;
    }
]);


Bebella.controller('CategoryEditCtrl', ['$scope', 'Breadcumb', '$stateParams', 'CategoryRepository',
    function ($scope, Breadcumb, $stateParams, CategoryRepository) {
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'category_detail({categoryId: ' + $stateParams.categoryId + '})', text: 'Categoria'},
            {text: 'Formulário de Cadastro'}
        ];
        
    
        $scope.edit = function () {
            CategoryRepository.edit($scope.category).then(
                function onSuccess (category) {
                    alert("Categoria editada com sucesso.");
                },
                function onError (res) {
                    alert("Erro ao criar esta categoria.");
                }
            );
        };
        
        CategoryRepository.find($stateParams.categoryId).then(
            function onSuccess (category) {
                $scope.category = category;
                
                Breadcumb.title = category.name;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos dados desta categoria");
            }
        );
        
    }
]);




Bebella.controller('CategoryListCtrl', ['$scope', 'CategoryRepository', 'Breadcumb',
    function ($scope, CategoryRepository, Breadcumb) {
        
        Breadcumb.title = 'Categorias';
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {text: 'Lista'}
        ];
        
        CategoryRepository.all().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de categorias");
            }
        );
        
    }
]);


Bebella.controller('CategoryNewCtrl', ['$scope', 'CurrentCategory', 'CategoryRepository', 'Breadcumb',
    function ($scope, CurrentCategory, CategoryRepository, Breadcumb) {
        
        Breadcumb.title = 'Nova Categoria';
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {text: 'Formulário de Cadastro'}
        ];
        
        $scope.category = CurrentCategory.get();
    
        $scope.create = function () {
            CategoryRepository.save($scope.category).then(
                function onSuccess (category) {
                    alert("Categoria cadastrada com sucesso.");
                    CurrentCategory.clear();
                },
                function onError (res) {
                    alert("Erro ao criar esta categoria.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentCategory.clear();
            $scope.category = CurrentCategory.get();
        };
    }
]);



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



Bebella.controller('ProductOptionDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'ProductOptionRepository', 'ReportRepository',
    function ($scope, $stateParams, Breadcumb, ProductOptionRepository, ReportRepository) {

        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'product_option_list', text: 'Lista'},
            {text: 'Opção de Produto'}
        ];
        
        $scope.viewClickDataset = [
            {
                color: "#fb2b67",
                label: "visualizações",
                shadowSize: 1,
                data: []
            },
            {
                color: "#ff6511",
                label: "cliques",
                shadowSize: 1,
                data: []
            }
        ];

        $scope.redirectOptions = {
            legend: {
                show: true,
                container: "#chart-legends1"
            },
            series: {
                lines: {
                    lineWidth: 2
                }
            },
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%d/%m/%y"
            }
        };

        $scope.viewClickOptions = {
            legend: {
                show: true,
                container: "#chart-legends2"
            },
            series: {
                lines: {
                    lineWidth: 2
                }
            },
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%d/%m/%y"
            }
        };

        ProductOptionRepository.find($stateParams.productOptionId).then(
                function onSuccess(productOption) {
                    $scope.productOption = productOption;

                    Breadcumb.title = productOption.name;
                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de produtos");
                }
        );

        ReportRepository.redirectsByProductOption($stateParams.productOptionId).then(
                function onSuccess(results) {
                    $scope.redirectDataset = [
                        {
                            color: "#fb2b67",
                            label: "redirecionamentos",
                            shadowSize: 1,
                            data: _.map(results, function (e) {
                                return [new Date(e.date), e.count];
                            })
                        }
                    ];
                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de redirecionamentos");
                }
        );

        ReportRepository.clicksByProductOption($stateParams.productOptionId).then(
                function onSuccess(results) {

                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de cliques");
                }
        );

        ReportRepository.viewsByProductOption($stateParams.productOptionId).then(
                function onSuccess(results) {
                    $scope.viewClickDataset[0].data = _.map(results, function (e) {
                        return [new Date(e.date), e.count];
                    });
                },
                function onError(res) {
                    alert("Houve um erro na obtenção da lista de visualizações");
                }
        );



    }
]);


Bebella.controller('ProductOptionListCtrl', ['$scope', 'ProductOptionRepository',
    function ($scope, ProductOptionRepository) {
        
        ProductOptionRepository.all().then(
            function onSuccess (list) {
                $scope.product_options = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de opções de produto.");
            }
        );
        
    }
]);


Bebella.controller('ProductOptionNewCtrl', ['$scope', 'StoreRepository', 'ProductRepository', 'ProductOptionRepository', 'CurrentProductOption',
    function ($scope, StoreRepository, ProductRepository, ProductOptionRepository, CurrentProductOption) {
    
        $scope.product_option = CurrentProductOption.get();
    
        StoreRepository.all().then(
            function onSuccess (list) {
                $scope.stores = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de lojas");
            }
        );

        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de lojas");
            }
        );
    
        $scope.create = function () {
            ProductOptionRepository.save($scope.product_option).then(
                function onSuccess (product_option) {
                    alert(product_option.id);
                    alert("Opção de produto cadastrada com sucesso");
                },
                function onError (res) {
                    alert("Erro ao cadastrar opção de produto.");
                }
            );
        };
    
    
        $scope.clear = function () {
            CurrentProductOption.clear();
            
            $scope.product_option = CurrentProductOption.get();
        };
    
    }
]);



Bebella.controller('ProductEditCtrl', ['$scope', '$stateParams', 'ProductRepository', 'CategoryRepository',
    function ($scope, $stateParams, ProductRepository, CategoryRepository) {
    
        $scope.edit = function () {
            ProductRepository.edit($scope.product).then(
                function onSuccess (product) {
                    alert("Produto editado com sucesso.");
                },
                function onError (res) {
                    alert("Erro ao criar este produto.");
                }
            );
        };
        
        ProductRepository.find($stateParams.productId).then(
            function onSuccess (product) {
                $scope.product = product;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos dados deste produto");
            }
        );

        CategoryRepository.all().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de categorias");
            }
        );
        
    }
]);



Bebella.controller('ProductListCtrl', ['$scope', 'ProductRepository',
    function ($scope, ProductRepository) {
        
        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de produtos.");
            }
        );
        
    }
]);


Bebella.controller('ProductNewCtrl', ['$scope', 'CurrentProduct', 'CategoryRepository', 'ProductRepository',
    function ($scope, CurrentProduct, CategoryRepository, ProductRepository) {
        
        $scope.product = CurrentProduct.get();
        
        $scope.create = function () {
            ProductRepository.save($scope.product).then(
                function onSuccess (product) {
                    alert(product.id);
                    alert("Produto criado com sucesso.");
                },
                function onError () {
                    alert("Houve um erro na criação do produto.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentProduct.clear();
            $scope.product = CurrentProduct.get();
        };
        
        CategoryRepository.all().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção das lista de categorias");
            }
        );
        
    }
]);



Bebella.controller('RecipeEditCtrl', ['$scope', '$stateParams', '$timeout', 'RecipeRepository', 'ChannelRepository', 'ProductRepository',
    function ($scope, $stateParams, $timeout, RecipeRepository, ChannelRepository, ProductRepository) {
        
        ChannelRepository.all().then(
            function onSuccess (list) {
                $scope.channels = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de canais");
            }
        );
        
        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de produtos");
            }
        );
        
        RecipeRepository.find($stateParams.recipeId).then(
            function onSuccess (recipe) {
                $scope.recipe = recipe;
                console.log(recipe);
            },
            function onError (res) {
                alert("Houve um erro na obtenção da receita.");
            }
        );

        $scope.edit = function () {
            RecipeRepository.edit($scope.recipe).then(
                function onSuccess (recipe) {
                    alert("Receita editada com sucesso.");
                },
                function onError (res) {
                    alert("Erro ao editar receita");
                }
            );
        };
        
        $scope.newTag = function () {
            $scope.recipe.tags.push({});
        };
        
        $scope.removeTag = function () {
            $scope.recipe.tags.pop();
        };
        
        $scope.newStep = function () {
            $scope.recipe.steps.push({});
        };
        
        $scope.removeStep = function () {
            $scope.recipe.steps.pop();
        };
        
        $scope.newProduct = function () {
            $scope.recipe.products.push({});
        };
        
        $scope.removeProduct = function () {
            $scope.recipe.products.pop();
        };
        
    }
]);


Bebella.controller('RecipeListCtrl', ['$scope', 'RecipeRepository',
    function ($scope, RecipeRepository) {
        
        RecipeRepository.all().then(
            function onSuccess (list) {
                $scope.recipes = list;
            },
            function onError (res) {
                alert("Erro ao carregar lista de receitas");
            } 
        );
        
    }
]);


Bebella.controller('RecipeNewCtrl', ['$scope', 'ChannelRepository', 'RecipeRepository', 'ProductRepository', 'CurrentRecipe',
    function ($scope, ChannelRepository, RecipeRepository, ProductRepository, CurrentRecipe) {
        
        $scope.recipe = CurrentRecipe.get();
        
        ChannelRepository.all().then(
            function onSuccess (list) {
                $scope.channels = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de canais");
            }
        );
        
        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de produtos");
            }
        );
        
        
        $scope.create = function () {
            RecipeRepository.save($scope.recipe).then(
                function (recipe) {
                    alert(recipe.id);
                    alert("Nova receita criada com sucesso.");
                },
                function (res) {
                    alert("Houve um erro na criação desta receita.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentRecipe.clear();
            $scope.recipe = CurrentRecipe.get();
        };
        
        $scope.newTag = function () {
            $scope.recipe.tags.push({});
        };
        
        $scope.removeTag = function () {
            $scope.recipe.tags.pop();
        };
        
        $scope.newStep = function () {
            $scope.recipe.steps.push({});
        };
        
        $scope.removeStep = function () {
            $scope.recipe.steps.pop();
        };
        
        $scope.newProduct = function () {
            $scope.recipe.products.push({});
        };
        
        $scope.removeProduct = function () {
            $scope.recipe.products.pop();
        };
    }
]);



Bebella.controller('StoreListCtrl', ['$scope', 'StoreRepository',
    function ($scope, StoreRepository) {
    
        StoreRepository.all().then(
            function onSuccess (list) {
                $scope.stores = list;
            },
            function onError (res) {
                alert("Erro ao obter a lista de lojas.");
            }
        );
    
    }
]);


Bebella.controller('StoreNewCtrl', ['$scope', 'CurrentStore', 'StoreRepository',
    function ($scope, CurrentStore, StoreRepository) {
        
        $scope.store = CurrentStore.get();
        
        $scope.create = function () {
            StoreRepository.save($scope.store).then(
                function onSuccess (store) {
                    alert(store.id);
                    alert("Loja cadastrada com sucesso");
                },
                function onError (res) {
                    alert("Houve um erro ao cadastrar a loja.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentStore.clear();
            $scope.store = CurrentStore.get();
        };
        
    }
]);



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
                
                .state('recipe_edit', {
                    url: '/recipe/{recipeId}/edit',
                    views: {
                        MainContent: {
                            templateUrl: view('recipe/edit')
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
                
                .state('category_edit', {
                    url: '/category/edit/{categoryId}',
                    views: {
                        MainContent: {
                            templateUrl: view('category/edit')
                        }
                    }
                })
                
                .state('store_new', {
                    url: '/store/new',
                    views: {
                        MainContent: {
                            templateUrl: view('store/new')
                        }
                    }
                })
                
                .state('store_list', {
                    url: '/store/list',
                    views: {
                        MainContent: {
                            templateUrl: view('store/list')
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
                
                .state('product_edit', {
                    url: '/product/edit/{productId}',
                    views: {
                        MainContent: {
                            templateUrl: view('product/edit')
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
                
                .state('product_option_detail', {
                    url: '/product_option/{productOptionId}/detail',
                    views: {
                        MainContent: {
                            templateUrl: view('product_option/detail')
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