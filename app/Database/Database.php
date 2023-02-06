<?php

    namespace Shiroaky\Dogle\Database;

    use mysqli;
    use Shiroaky\Dogle\Interfaces\Database_interface;

    class Database implements Database_interface
    {

        /**
         * @return mysqli Connection object
         */
        private static function connection(): mysqli
        {
            try {
                $con = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
                return $con;
            } catch (\Throwable $th) {
                echo 'Ocurrio un error al conectarse a la base de datos';
            }
        }

        public static function query(string $query)
        {
            return self::connection()->query($query);
        }

        public static function select_from(string $from, string $elements, bool $require_limit = false, int $limit_number = 0, mixed $order = null): array
        {
            if (!is_null($order)) $order = strtoupper($order);
            switch($require_limit) {
                case false: $request = self::query("SELECT $elements FROM $from"); break;
                case true: $request = self::query("SELECT $elements FROM $from LIMIT $limit_number ORDER BY `create_at` $order"); break;
            }
            $result = [];
            while($data = $request->fetch_assoc()) $result[] = $data;
            return $result;
        }

        public static function select_all_where(string $table = null): array
        {
            $result = [];
            $request = self::query("SELECT * FROM $table");
            while($data = $request->fetch_assoc()) $result[] = $data;
            return $result;
        }

        public static function close_connection()
        {
            self::connection()->close();
        }

    }