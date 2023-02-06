<?php

    namespace Shiroaky\Dogle\Controllers;

    use Shiroaky\Dogle\Controllers\BaseController;
    use Shiroaky\Dogle\Core\Request;

    class TestController extends BaseController
    {

        public static function index()
        {
            // print_r(Request::get_request_body());
        }

        public static function show()
        {
            
        }

    }