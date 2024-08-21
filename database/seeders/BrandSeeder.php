<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'نایک', 'آدیداس', 'پوما', 'ریباک', 'آندر آرمور', 
            'نیو بالانس', 'اسیکس', 'سالامون', 'مرل', 'کلمبیا',
            'نورث فیس', 'پتگونیا', 'لاکوست', 'فلا', 'دیادورا',
            'کاپا', 'میزونو', 'اسکچرز', 'سائوکن', 'بروکس'
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'title' => $brand,
                'slug' => Str::slug($brand),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}