<?php

    namespace Shiroaky\Dogle\Models;

    use Shiroaky\Dogle\Models\BaseModel;
    use Shiroaky\Dogle\Database\Database;
    use Shiroaky\Dogle\Core\Render;
    
    class TemplateModel extends BaseModel
    {

        public static function up()
        {
            /**
             * Usage: if you require api show info use Render::json($data) else use return $data
             */
            $data = Database::select_from('', '*');

            // Termine connection:
            self::down();
        }

        public static function down()
        {
            Database::close_connection();
        }

    }