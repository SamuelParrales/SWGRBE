<?php

namespace Database\Seeders\testdata;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::where('username', 'Offeror01Prueba')->first()->id;

        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Licuadora";
        $product->description = null;
        $product->category_id = 2;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0939797192';
        $product->created_at = '2022-12-12 23:16:04';
        $product->updated_at = '2022-12-12 23:16:04';
        $product->save();

        $image = new Image();
        $image->public_id = "products/p058duweumhgjrczgige";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676059945/products/p058duweumhgjrczgige.jpg";
        $image->product_id = $product->id;
        $image->Save();

        // Offeror2

        $user_id = User::where('username', 'Offeror02Prueba')->first()->id;
        // Product 2
        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Televisor clasico";
        $product->description = "En perfecto estado";
        $product->category_id = 4;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0987043526';
        $product->created_at = '2022-12-15 10:05:08';
        $product->updated_at = '2022-12-15 10:05:07';
        $product->save();

        $image = new Image();
        $image->public_id = "products/zpf6z8ftoy1dijoiqvra";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676242810/products/zpf6z8ftoy1dijoiqvra.jpg";
        $image->product_id = $product->id;
        $image->Save();

        $image = new Image();
        $image->public_id = "products/retq04bdkqjjrqzi3xjj";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676242812/products/retq04bdkqjjrqzi3xjj.jpg";
        $image->product_id = $product->id;
        $image->Save();
        // Product 3
        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Computador intel pentium";
        $product->description = "Incluye mouse y teclado";
        $product->category_id = 3;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0983670287';
        $product->created_at = '2022-12-19 17:05:05';
        $product->updated_at = '2022-12-19 17:05:05';
        $product->save();

        $image = new Image();
        $image->public_id = "products/mytbkn7trqxjgpir1mhx";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676243770/products/mytbkn7trqxjgpir1mhx.jpg";
        $image->product_id = $product->id;
        $image->Save();

        $image = new Image();
        $image->public_id = "products/hxvk2fkp7rw7vdavmheg";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676243772/products/hxvk2fkp7rw7vdavmheg.jpg";
        $image->product_id = $product->id;
        $image->Save();

        $image = new Image();
        $image->public_id = "products/trsr7atco4u4ts3xecid";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676243773/products/trsr7atco4u4ts3xecid.jpg";
        $image->product_id = $product->id;
        $image->Save();
        // Product 4

        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Nevera roja";
        $product->description = "No funciona el motor";
        $product->category_id = 1;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0988771959';
        $product->created_at = '2022-12-22 18:07:05';
        $product->updated_at = '2022-12-22 18:07:05';
        $product->save();

        $image = new Image();
        $image->public_id = "products/jfltmxeyk7otlhaakftr";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676245269/products/jfltmxeyk7otlhaakftr.jpg";
        $image->product_id = $product->id;
        $image->Save();

        $image = new Image();
        $image->public_id = "products/xxzt5s0anmqlero2zsg3";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676245270/products/xxzt5s0anmqlero2zsg3.jpg";
        $image->product_id = $product->id;
        $image->Save();
        // Product 5


        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Lavadora";
        $product->description = "Estas lavadoras son, actualmente útiles para muchas familias, que no tienen poder adquisitivo, para comprar una automática, son sencillas , hacen buen contacto entre el agua jabonosa y la ropa";
        $product->category_id = 1;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0997813017';
        $product->created_at = '2023-01-05 18:07:05';
        $product->updated_at = '2023-01-05 18:07:05';
        $product->save();

        $image = new Image();
        $image->public_id = "products/u3ntovml0wybksr5g3du";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676245567/products/u3ntovml0wybksr5g3du.jpg";
        $image->product_id = $product->id;
        $image->Save();

        // Product 6

        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Lavadora indurama";
        $product->description = "Tiene la transmisión dañada";
        $product->category_id = 1;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0997813017';
        $product->created_at = '2023-01-06 13:07:05';
        $product->updated_at = '2023-01-06 13:07:05';
        $product->save();


        $image = new Image();
        $image->public_id = "products/wt8i2doicnkijm0j5q8m";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676245658/products/wt8i2doicnkijm0j5q8m.jpg";
        $image->product_id = $product->id;
        $image->Save();
        // Product 7

        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Televisor con la pantalla rota";
        $product->description = "Te regalo los soportes";
        $product->category_id = 4;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0987043526';
        $product->created_at = '2023-01-09 14:07:05';
        $product->updated_at = '2023-01-09 14:07:05';
        $product->save();

        $image = new Image();
        $image->public_id = "products/w2wuuxopq5kenvr42jqs";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676245822/products/w2wuuxopq5kenvr42jqs.jpg";
        $image->product_id = $product->id;
        $image->Save();

        // Porduct 8
        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "PS3";
        $product->description = "Esta nuevo solo se cayó una vez :)";
        $product->category_id = 7;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0983670287';
        $product->created_at = '2023-01-09 14:09:00';
        $product->updated_at = '2023-01-09 14:09:01';
        $product->save();

        $image = new Image();
        $image->public_id = "products/gmheattp4ctph5taapgy";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676245894/products/gmheattp4ctph5taapgy.jpg";
        $image->product_id = $product->id;
        $image->Save();

        // Porduct 9
        $product = new Product();
        $product->user_id = $user_id;
        $product->name = "Televisor antiguo";
        $product->description = "Con que encienda es suficiente";
        $product->category_id = 3;
        $product->has_whatsapp = true;
        $product->recycled = false;
        $product->cell_phone_num = '0983670287';
        $product->created_at = '2023-01-10 14:09:00';
        $product->updated_at = '2023-01-10 14:09:01';
        $product->save();

        $image = new Image();
        $image->public_id = "products/poraiaaw4ru66hfv35gq";
        $image->url = "https://res.cloudinary.com/ddrfdszk5/image/upload/v1676246127/products/poraiaaw4ru66hfv35gq.jpg";
        $image->product_id = $product->id;
        $image->Save();
    }
}
