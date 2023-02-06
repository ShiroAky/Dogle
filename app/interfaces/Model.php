<?php

    namespace Shiroaky\Dogle\Interfaces;

    interface Model
    {

        /**
         * @return mixed Up the model works
         */
        public static function up();

        /**
         * @return mixed Down the model works
         */
        public static function down();

    }