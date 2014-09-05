<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home',
));

/* Authenticated group */
Route::group( array('before' => 'auth'), function() {

    // CSRF Protection
    Route::group( array('before' => 'csrf'), function() {

        Route::post('/account/change-password', array(
                'as' => 'account-change-password-post',
                'uses' => 'AccountController@postChangePassword',
            ));

        Route::post('/type/create', array(
                'as' => 'type-create-post',
                'uses' => 'TypeController@postCreateType',
            ));

        Route::post('/state/create', array(
                'as' => 'state-create-post',
                'uses' => 'StateController@postCreateState',
            ));

    });

    Route::get('/account/change-password', array(
            'as' => 'account-change-password',
            'uses' => 'AccountController@getChangePassword',
        ));


    Route::get('/type/create', array(
            'as' => 'type-create',
            'uses' => 'TypeController@getCreateType',
        ));

    Route::get('/state/create', array(
            'as' => 'state-create',
            'uses' => 'StateController@getCreateState',
        ));

    Route::get('/account/sign-out',

        array(
            'as'    => 'account-sign-out',
            'uses'  => 'AccountController@getSignOut',
        ));

});

/* Unauthenticated group */
Route::group( array('before' => 'guest'), function() {

    /* CSRF protection */
    Route::group( array('before' =>'csrf'), function() {

        /* Create account (POST) */
        Route::post('/account/create', array(
            'as'    => 'account-create-post',
            'uses'  => 'AccountController@postCreate',
        ));

        /* Sign In (POST) */
        Route::post('/account/sign-in', array(
            'as'    => 'account-sign-in-post',
            'uses'  => 'AccountController@postSignIn',
        ));

        /* Forgot Password (POST) */
        Route::post('/account/forgot-password', array(
            'as'    => 'account-forgot-password-post',
            'uses'  => 'AccountController@postForgotPassword',
        ));

    });

    /* Forgot Password (GET) */
    Route::get('/account/forgot-password', array(
        'as'    => 'account-forgot-password',
        'uses'  => 'AccountController@getForgotPassword',
    ));

    /* Recover forgotten password */
    Route::get('/account/recover/{code}', array(
        'as'    => 'account-recover',
        'uses'  => 'AccountController@getRecover',
    ));

    /* Sign In (GET) */
    Route::get('/account/sign-in', array(
        'as'    => 'account-sign-in',
        'uses'  => 'AccountController@getSignIn',
    ));

    /* Create account (GET) */
    Route::get('/account/create', array(
        'as'    => 'account-create',
        'uses'  => 'AccountController@getCreate',
    ));

    /* New account activation */
    Route::get('/account/activate/{code}', array(
        'as'    => 'account-activate',
        'uses'  => 'AccountController@getActivate',
    ));

});