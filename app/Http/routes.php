<?php

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'web'
], function () {
    
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postlogin');
    
});

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'auth'
], function () {
    
    Route::get('/logout', 'AuthController@getLogout');
    
});

Route::get('/', function () {
    return redirect()->to('/web');
});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'api'
], function () {
    
    Route::group([
        'namespace' => 'v1',
        'prefix' => 'v1'
    ], function () {
        
        Route::group([
            'prefix' => 'user'
        ], function () {
            
        });
        
        Route::group([
            'prefix' => 'channel'
        ], function () {
            
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
            
        });

        Route::group([
            'prefix' => 'productOption'
        ], function () {
            
        });

        Route::group([
            'prefix' => 'recipe'
        ], function () {
            
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
        
    });
    
    Route::group([
        'namespace' => 'ProductOption',
        'prefix' => 'product_option'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        
    });
    
    Route::group([
        'namespace' => 'Recipe',
        'prefix' => 'recipe'
    ], function () {
        
        Route::get('/new', 'ViewController@getNew');
        Route::get('/list', 'ViewController@getList');
        
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
    
});

Route::group([
    'namespace' => 'Store',
    'prefix' => 'store'
], function () {
    
    Route::get('/', 'IndexController@getIndex');
    
});
