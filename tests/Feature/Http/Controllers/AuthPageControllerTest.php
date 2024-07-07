<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthPageControllerTest extends TestCase
{
    use WithFaker;
    public function it_stores_data()
    {
        //Membuat objek akun yang otomatis menambahkannya ke database.
        $akun = factory(CategoryModel::class)->create();

        //Acting as berfungsi sebagai autentikasi, jika kita menghilangkannya maka akan error.
        $response = $this->actingAs($akun)
        //Hit post ke method store, fungsinya ya akan lari ke fungsi store.
        ->post(route('register'), [
            //isi parameter sesuai kebutuhan request
            'role' => 'admin',
            'id_unit' => '1',
            'name' => $faker->words(3, true),
            'name' => $faker->email(),
            'password' => '123'
        ]);

        //Tuntutan status 302, yang berarti redirect status code.
        $response->assertStatus(302);

        //Tuntutan bahwa abis melakukan POST URL akan dialihkan ke URL product atau routenya adalah product.index
        $response->assertRedirect(route('simpan'));
    }
}
