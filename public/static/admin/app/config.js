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