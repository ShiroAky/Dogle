<?php

    namespace Shiroaky\Dogle\Utils;

    class UUID
    {

        /**
         * @return string Return the unique id
         */
        public static function generate() :string
        {
            return uniqid();
        }

    }