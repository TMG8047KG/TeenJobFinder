<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Tags
        Tag::create(['tag' => 'Remote',]);
        Tag::create(['tag' => 'Hybrid',]);
        Tag::create(['tag' => 'In-person',]);

        //Types
        Category::create(['name' => 'Job Offer']);
        Category::create(['name' => 'Job Seeker']);

        User::factory(10)->create();

        User::create([
            'username' => 'Alex Rusev',
            'email' => 'alex.rusev23@gmail.com',
            'password' => bcrypt('secret'),
            'bio' => 'Lead Software Developer',
            'phone' => '1-753-898-8210',
            'age' => 32,
            'location' => 'New York, USA',
        ]);

        foreach (User::all() as $user) {
            $user->company()->save(Company::factory()->create());
        }

        Post::factory(20)->create();

        foreach (Post::all() as $post) {
            $post->categories()->attach(1);
            $post->tags()->attach(Tag::all()->random(rand(1,3)));
        }

        User::factory(10)->create();

        foreach (User::latest()->take(10)->get() as $user) {
            Post::factory()->create([
                'user_id' => $user->id
            ]);
        }

        foreach (Post::latest()->take(10)->get() as $post) {
            $post->categories()->attach(2);
        }

//        User::create([
//            'username' => 'Alex Rusev',
//            'email' => 'alex.rusev23@gmail.com',
//            'password' => bcrypt('secret'),
//            'bio' => 'Lead Software Developer',
//            'phone' => '1-753-898-8210',
//            'photo' => Storage::get('public/storage/example_photos/male.jpeg'),
//            'age' => 32,
//            'location' => 'New York, USA'
//        ]);

        Company::create([
            'user_id' => 1,
            'name' => 'Code Spark',
            'address' => 'New York, USA',
            'phone' => '1-352-612-8240',
            'description' => 'Innovative software ideas',
            'email' => 'codespark@codespark.com'
        ]);

        $post = Post::create([
            'title' => 'Software development in C/C++ and Java',
            'skills' => 'Not required, Basic Programming Concepts',
            'description' => 'We are looking for Software Developers that have basic programming knowledge and are motivated to work in the industry',
            'work_time' => '6',
            'salary' => '1600',
            'user_id' => 1,
        ]);
        $post->categories()->attach(1);
        $post->tags()->attach(1);


    }
}
