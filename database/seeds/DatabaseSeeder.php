<?php

use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        Schema::create('user', function($table)
        {
            $table->integer('id');
            $table->string('name');
            $table->date('created_at');
            $table->date('updated_at');
        });

        Schema::create('movement', function($table)
        {
            $table->integer('id');
            $table->string('name');
            $table->date('created_at');
            $table->date('updated_at');
        });


        Schema::create('personal_record', function($table)
        {
            $table->integer('id');
            $table->integer('user_id');
            $table->integer('movement_id');
            $table->string('value');
            $table->date('date');
            $table->date('created_at');
            $table->date('updated_at');
        });

    
        User::create([
            'name' => Str::random(10),
            'id'   =>1,
        ]);

        Movement::create([
            'name' => Str::random(10),
            'id'   =>1,
        ]);

        PersonalRecord::create([
            'id'   =>1,
            'user_id' =>1,
            'movement_id' =>1,
            'value' => 100,
            'date' =>'2022-03-20 16:49:34'
        ]);

    }
}