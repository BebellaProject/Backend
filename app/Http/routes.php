<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

Route::get('/fix', function () {
    foreach (Bebella\User::get() as $user) 
    {
        $user->api_token = str_random(120);
        
        $user->save();
    }
    
    return 1;
});

Route::get('/ping', function () {
    return "Pong!";
});

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'web'
], function () {
    
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postlogin');
   
    Route::post('/api_login', 'AuthController@postApiLogin');
    Route::post('/api_register', 'AuthController@postApiRegister');
    
});

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'auth'
], function () {
    
    Route::get('/logout', 'AuthController@getLogout');
    Route::get('/user', 'AuthController@getUser');
    
});

Route::get('/', function () {
    return redirect()->to('/web');
});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'api',
    'middleware' => 'auth:api'
], function () {
    
    Route::group([
        'namespace' => 'v1',
        'prefix' => 'v1'
    ], function () {
        
        Route::group([
            'prefix' => 'user'
        ], function () {
            
            Route::post('/save', 'UserController@save');
            Route::get('/all', 'UserController@all');
            
        });

        Route::group([
            'prefix' => 'store'
        ], function () {
            
            Route::get('/all', 'StoreController@all');
            Route::get('/find/{id}', 'StoreController@find');
            Route::post('/save', 'StoreController@save');
            Route::post('/edit', 'StoreController@edit');
            
        });
        
        Route::group([
            'prefix' => 'search'
        ], function () {
            
            Route::post('/recipe', 'SearchController@searchRecipe');
            
        });

        
        Route::group([
            'prefix' => 'channel'
        ], function () {
            
            Route::get('/all', 'ChannelController@all');
            Route::get('/find/{id}', 'ChannelController@find');
            Route::post('/save', 'ChannelController@save');
            Route::post('/edit', 'ChannelController@edit');
            
        });

        Route::group([
            'prefix' => 'category'
        ], function () {
            
            Route::get('/all', 'CategoryController@all');
            Route::get('/find/{id}', 'CategoryController@find');
            Route::post('/save', 'CategoryController@save');
            Route::post('/edit', 'CategoryController@edit');
            
        });
        
        Route::group([
            'prefix' => 'product'
        ], function () {
            
            Route::get('/all', 'ProductController@all');
            Route::get('/find/{id}', 'ProductController@find');
            Route::post('/save', 'ProductController@save');
            Route::post('/edit', 'ProductController@edit');
            
        });

        Route::group([
            'prefix' => 'product_option'
        ], function () {
            
            Route::get('/all', 'ProductOptionController@all');
            Route::get('/find/{id}', 'ProductOptionController@find');
            Route::get('/byProduct/{id}', 'ProductOptionController@byProduct');
            Route::get('/getStoreUrl/{id}', 'ProductOptionController@getStoreUrl');
            Route::post('/save', 'ProductOptionController@save');
            
        });

        Route::group([
            'prefix' => 'recipe'
        ], function () {
        
            Route::get('/all', 'RecipeController@all');
            Route::get('/trending', 'RecipeController@trending');
            Route::get('/find/{id}', 'RecipeController@find');
            Route::post('/save', 'RecipeController@save');
            Route::post('/edit', 'RecipeController@edit');
         
            Route::post('/comment/{id}', 'RecipeController@comment');
            
            Route::post('/paginateWithFilters/{page}', 'RecipeController@paginateWithFilters');
            Route::post('/trendingWithFilters/{page}', 'RecipeController@trendingWithFilters');
            
        });
        
        Route::group([
            'prefix' => 'report'
        ], function () {
            
            Route::get('/redirectsByProductOption/{id}', 'ReportController@redirectsByProductOption');
            Route::get('/clicksByProductOption/{id}', 'ReportController@clicksByProductOption');
            Route::get('/viewsByProductOption/{id}', 'ReportController@viewsByProductOption');
            
        });
        
    });
    
});

Route::group([
    'namespace' => 'Web',
    'prefix' => 'web'
], function () {
    
    Route::get('/', 'IndexController@getIndex');
    
});

Route::group([
    'namespace' => 'User',
    'prefix' => 'user'
], function () {
    
    Route::get('/', 'IndexController@getIndex');
    
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function () {
    
    Route::get('/', 'IndexController@getIndex');
    
    Route::group([
        'namespace' => 'Dashboard',
        'prefix' => 'dashboard'
    ], function () {
        
        Route::get('/', 'ViewController@getIndex');
        
    });
    
    Route::group([
        'namespace' => 'Category',
        'prefix' => 'category'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        Route::get('/edit', 'ViewController@getEdit');
        
    });
    
    Route::group([
        'namespace' => 'Channel',
        'prefix' => 'channel'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        
    });
    
    Route::group([
        'namespace' => 'Store',
        'prefix' => 'store'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        
    });
    
    Route::group([
        'namespace' => 'Product',
        'prefix' => 'product'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        Route::get('/edit', 'ViewController@getEdit');
        
    });
    
    Route::group([
        'namespace' => 'ProductOption',
        'prefix' => 'product_option'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        Route::get('/detail', 'ViewController@getDetail');
        
    });
    
    Route::group([
        'namespace' => 'Recipe',
        'prefix' => 'recipe'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        Route::get('/edit', 'ViewController@getEdit');
        
    });
    
    Route::group([
        'namespace' => 'User',
        'prefix' => 'user'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        
    });
    
});

Route::group([
    'namespace' => 'Channel',
    'prefix' => 'channel'
], function () {
    
    Route::get('/', 'IndexController@getIndex');
   
    Route::group([
        'namespace' => 'Dashboard',
        'prefix' => 'dashboard'
    ], function () {
        
        Route::get('/', 'ViewController@getIndex');
        
    });
    
    Route::group([
        'namespace' => 'Profile',
        'prefix' => 'profile'
    ], function () {
        
        Route::get('/', 'ViewController@getIndex');
        
    });
    
    Route::group([
        'namespace' => 'Recipe',
        'prefix' => 'recipe'
    ], function () {
        
        Route::get('/list', 'ViewController@getList');
        Route::get('/new', 'ViewController@getNew');
        
    });
    
    
});

Route::group([
    'namespace' => 'Store',
    'prefix' => 'store'
], function () {
    
    Route::get('/', 'IndexController@getIndex');
    
});
