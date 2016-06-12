<?php

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
        factory(App\Models\Product::class, 50)->create()
            ->each(function($u) {
                \App\Models\Receiving::create([
                    'product_id' => $u->id,
                    'quantity' => 50
                ]);
            });;
    }
}
