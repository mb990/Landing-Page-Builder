<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * Class AdminSeeder
 */
class AdminSeeder extends Seeder
{
    /**
     * @var Faker
     */
    private $faker;

    /**
     * AdminSeeder constructor.
     * @param Faker $faker
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();

        $admin->first_name = $this->faker->firstName;
        $admin->last_name = $this->faker->lastName;
        $admin->email = 'admin@landing-page-builder.com';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('admin123');
        $admin->remember_token = Str::random(10);

        $admin->save();

        $admin->assignRole('admin');
    }
}
