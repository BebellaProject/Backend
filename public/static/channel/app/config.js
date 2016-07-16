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