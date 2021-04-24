<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Desk;
use App\Models\DeskList;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
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
        User::factory(10)->create();
        Desk::factory(10)->create();
        DeskList::factory(30)->create();
        Task::factory(150)->create();
        Tag::factory(200)->create();
    }
}
