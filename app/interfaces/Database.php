<?php

    namespace Shiroaky\Dogle\Interfaces;

    use mysqli;

    interface Database_interface
    {

        /**
         * @param string $query
         */
        public static function query(string $query);

        /**
         * @param string $from The name of the select table
         * @param string $elements The elements list if you require select specifict elements use "," to divide it else require all elements use "*"
         * @param bool $require_limit Validate if require limit
         * @param int $limit_number The number of limit
         * @param mixed $order The result order 'ASC' or 'DESC'
         * @return array Result elements
         */
        public static function select_from(string $from, string $elements, bool $require_limit = false, int $limit_number = 0, mixed $order = null): array;

        /**
         * @param string $table Name for select all elements from uniq datatable
         * @return array Return all elements from 
         */
        public static function select_all_where(string $table = null): array;

        /**
         * @return null Database close connection
         */
        public static function close_connection();

    }