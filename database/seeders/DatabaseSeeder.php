<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
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
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'john Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Crop',
        //     'location' => 'boston MA',
        //     'email' => 'email11@gmail.com',
        //     'website' => 'http://www.acme.com',
        //     'description' => '
        //     Laravel programmers must have proficient knowledge of fundamental web 
        //     technologies. They must have a thorough understanding of CSS, HTML, and 
        //     JavaScript to be able to build and deploy the applications. Prepare a list 
        //     of interview questions for Laravel developers, including these technologies.'
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email12@gmail.com',
        //     'website' => 'http://www.starkindustries.com',
        //     'description' => 'A full-stack engineer is a high-level software engineer 
        //     that works to design, test, and implement various software applications. 
        //     They create software, applications, and scalable web services, while also 
        //     providing leadership for coding teams.'
        // ]);
    }
}
