<?php

    namespace Shiroaky\Dogle\Controllers;

    use Shiroaky\Dogle\Controllers\BaseController;
    use Shiroaky\Dogle\Models\MoviesModel;

    class MoviesController extends BaseController
    {

        public static function index()
        {
            
        }

        public static function show()
        {
            MoviesModel::up();
        }

    }