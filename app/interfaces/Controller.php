<?php

    namespace Shiroaky\Dogle\Interfaces;

    interface Controller
    {

        /**
         * @return mixed Index method is main controller method
         */
        public static function index();

        /**
         * @return mixed Show method is secundary controller method
         */
        public static function show();

    }