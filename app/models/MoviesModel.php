<?php

    namespace Shiroaky\Dogle\Models;

    use Shiroaky\Dogle\Models\BaseModel;
    use Shiroaky\Dogle\Database\Database;
    use Shiroaky\Dogle\Core\Render;
    
    class MoviesModel extends BaseModel
    {

        public static function up()
        {
            $data = Database::select_from('movies', '*');
            if (count($data) > 0) Render::json($data);

            Render::json([
                'status_code' => 200, 
                'message' => 'No results found', 
                'count' => 0
            ]);

            self::down();
        }

        public static function down()
        {
            Database::close_connection();
        }

    }