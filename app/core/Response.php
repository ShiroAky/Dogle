<?php

    namespace Shiroaky\Dogle\Core;

    class Response
    {

        /**
         * @param int $code HTTP code of the response.
         */
        public static function set_status_code(int $code)
        {
            http_response_code($code);
        }

    }