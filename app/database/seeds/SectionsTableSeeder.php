<?php

class SectionsTableSeeder extends Seeder {

    public function run()
    {
    	
    	DB::table('sections')->delete();

        DB::table('sections')->insert(
 
            array(
                array(
                    'id' => 1,
                    'titre' => 'Section 1',
                    'description' => 'Description de la section 1',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 2,
                    'titre' => 'Section 2',
                    'description' => 'Description de la section 2',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
            )
        );

    }

}