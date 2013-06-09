<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
    	
    	DB::table('categories')->delete();

        DB::table('categories')->insert(
 
            array(

                array(
                    'id' => 1,
                    'titre' => 'Catégorie 1',
                    'section_id' => 1,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 2,
                    'titre' => 'Catégorie 2',
                    'section_id' => 1,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 3,
                    'titre' => 'Catégorie 3',
                    'section_id' => 2,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 4,
                    'titre' => 'Catégorie 4',
                    'section_id' => 2,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
            )
        );

    }

}