<?php

namespace Tests\Feature\Controllers\rest\v1\ProductRestController;

use App\Models\Offeror;
use App\Models\Product;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class updateTest extends TestCase
{

    protected $offeror1;
    protected $offeror2;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();

        Storage::fake('photos');


        $this->offeror1 = User::where('username', 'Offeror01Prueba')->first(); //must have products
        $this->offeror2  = User::where('username', 'Offeror02Prueba')->first();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function must_not_allow_an_authenticated_user_to_update_a_product_that_he_do_not_own()
    {

        Auth::login($this->offeror1);
        $product_id = $this->post(
            'api/v1/products',
            [
                'name' => 'name',
                'description' => 'desctipcion',
                'category_id' => 2,
                'has_whatsapp' => 1,
                'cell_phone_num' => '0988654321',
                'images' => [UploadedFile::fake()->image('photo1.jpg')],
                '_token' => csrf_token()
            ]
        )->decodeResponseJson()['id'];
        Auth::logout();

        $product = Product::find($product_id); //belong to offeror1
        Auth::login($this->offeror2);

        $response = $this->put(
            'api/v1/products/' . $product->id,
            [
                'name' => 'This is a name product',
                'description' => 'This is a description',
                'category_id' => 3,
                'has_whatsapp' => $product->has_whatsapp ? 0 : 1,
                'cell_phone_num' => '0987654321',
                'images' => [UploadedFile::fake()->image('photo2.jpg')],
                '_token' => csrf_token()
            ]
        );
        // fwrite(STDERR, print_r($response->decodeResponseJson()['error']), TRUE);
        $response->assertStatus(403);
        Auth::logout();
        $product->delete();
    }

/** @test */
    public function must_not_allow_an_authenticated_user_who_owns_the_product_to_update_it()
    {
        Auth::login($this->offeror1);
        $product_id = $this->post(
            'api/v1/products',
            [
                'name' => 'name',
                'description' => 'desctipcion',
                'category_id' => 2,
                'has_whatsapp' => 1,
                'cell_phone_num' => '0988654321',
                'images' => [UploadedFile::fake()->image('photo1.jpg')],
                '_token' => csrf_token()
            ]
        )->decodeResponseJson()['id'];
        $this->put('api/v1/products/' . $product_id . '/recycle');

        $product = Product::find($product_id); //belong to offeror1

        $response = $this->put(
            'api/v1/products/' . $product->id,
            [
                'name' => 'This is a name product',
                'description' => 'This is a description',
                'category_id' => 3,
                'has_whatsapp' => $product->has_whatsapp ? 0 : 1,
                'cell_phone_num' => '0987654321',
                'images' => [UploadedFile::fake()->image('photo2.jpg')],
                '_token' => csrf_token()
            ]
        );
        $response->assertStatus(423);
        Auth::logout();
        $product->delete();
    }
}
