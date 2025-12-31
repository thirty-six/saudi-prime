<?php

namespace Database\Seeders;

use App\Enums\ProgramCategoryEnum;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Program::upsert([
            [
                'category' => ProgramCategoryEnum::Morning,
                'description_ar' => 'برنامج الصباح مخصص لطالبات الجامعة ويشمل مجموعة من الأنشطة الرياضية لتعزيز اللياقة البدنية والصحة العامة.',
                'base_price' => 150,
            ],
            [
                'category' => ProgramCategoryEnum::Evening,
                'description_ar' => 'برنامج المساء موجه للنساء ويقدم جلسات رياضية متنوعة بعد ساعات العمل لتعزيز النشاط والحيوية.',
                'base_price' => 600,
            ],
        ], 
        ['category'],
        ['description_ar', 'base_price']
        );

        $this->call([
            RolesPermissionsSeeder::class,
        ]);

        User::createOrFirst(
            [
                'email' => 'admin@saudi-prime.com',
            ],
            [
                'name' => 'Owner User',
                'password' => bcrypt('password'),
            ]
        )->assignRole('Owner');
    }
}
