<?php
use Illuminate\Database\Seeder;
use App\User;
 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name'      => 'Lorem Ispum',
            'email'     => 'contato@teste.com',
            'password'  => bcrypt('123123'),
        ]);
    }
}