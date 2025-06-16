<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skill;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SubCategorySeeder::class,
        ]);

        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'img' => 'images/mentors/admin.jpg',
            'description' => 'System Administrator',
            'role' => 'admin',
        ]);

        // Create Mentor Users
        $mentors = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'img' => 'images/mentors/john.jpg',
                'description' => 'Senior Web Developer with 5 years of experience',
                'role' => 'mentor',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'img' => 'images/mentors/jane.jpg',
                'description' => 'UI/UX Designer and Frontend Developer',
                'role' => 'mentor',
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'password' => Hash::make('password'),
                'img' => 'images/mentors/mike.jpg',
                'description' => 'Mobile App Developer specializing in React Native',
                'role' => 'mentor',
            ],
        ];

        foreach ($mentors as $mentor) {
            User::create($mentor);
        }

        // Create Visitor Users
        $visitors = [
            [
                'name' => 'Visitor One',
                'email' => 'visitor1@example.com',
                'password' => Hash::make('password'),
                'img' => 'images/mentors/visitor1.jpg',
                'description' => 'Aspiring Web Developer',
                'role' => 'visitor',
            ],
            [
                'name' => 'Visitor Two',
                'email' => 'visitor2@example.com',
                'password' => Hash::make('password'),
                'img' => 'images/mentors/visitor2.jpg',
                'description' => 'Student interested in UI/UX Design',
                'role' => 'visitor',
            ],
        ];

        foreach ($visitors as $visitor) {
            User::create($visitor);
        }

        // Create Skills
        $skills = [
            'Web Development',
            'Mobile Development',
            'UI/UX Design',
            'Backend Development',
            'Frontend Development',
            'Database Management',
            'DevOps',
            'Cloud Computing',
            'Machine Learning',
            'Data Science',
        ];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}
