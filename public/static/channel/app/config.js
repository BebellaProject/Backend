Bebella.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/dashboard/profile');
        
        $stateProvider
                
                .state('recipes', {
                    url: '/recipe/list',
                    controller: 'RecipeListCtrl',
                    views: {
                        Content: {
                            templateUrl: view('recipe/list')
                        }
                    }
                })
                
                .state('new_recipe', {
                    url: '/recipe/new',
                    controller: 'RecipeNewCtrl',
                    views: {
                        Content: {
                            templateUrl: view('recipe/new')
                        }
                    }
                })
                
                .state('dashboard', {
                    url: '/dashboard',
                    controller: 'HomeIndexCtrl',
                    views: {
                        Content: {
                            templateUrl: view('dashboard')
                        }
                    }
                })
                
                .state('dashboard.profile', {
                    url: '/profile',
                    controller: 'ProfileIndexCtrl',
                    views: {
                        SubContent: {
                            templateUrl: view('profile')
                        }
                    }
                })
                
                .state('dashboard.stats', {
                    url: '/stats',
                    controller: 'StatsIndexCtrl',
                    views: {
                        SubContent: {
                            templateUrl: view('stats')
                        }
                    }
                })
        
    }
]);