<?php

namespace Database\Seeders\defaultdata;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name ="Grandes electrodomésticos";
        $category->save();

        $category = new Category();
        $category->name ="Pequeños electrodomésticos";
        $category->save();

        $category = new Category();
        $category->name ="Equipos informáticos y telecomunicaciones";
        $category->save();

        $category = new Category();
        $category->name ="Aparatos electrónicos de bajo consumo";
        $category->save();

        $category = new Category();
        $category->name ="Aparatos de alumbrado";
        $category->save();

        $category = new Category();
        $category->name ="Herramientas eléctricas o electrónicas";
        $category->save();

        $category = new Category();
        $category->name ="Juguetes y equipos deportivos o de tiempo libre";
        $category->save();

        $category = new Category();
        $category->name ="Aparatos médicos";
        $category->save();

        $category = new Category();
        $category->name ="Instrumentos de vigilancia y control";
        $category->save();

        $category = new Category();
        $category->name ="Máquinas expendedoras";
        $category->save();

    }
}
