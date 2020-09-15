<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sections = factory(\App\Section::class, 10)
            ->create()
            ->each(function ($section){
                $section->tasks()->createMany(
                    factory(App\Task::class, 10)->make()->toArray()
                );
            });
    }
}
