<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Database\Factories\EstablishmentFactory;
use Database\Factories\PurchaseFactory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        EstablishmentFactory::times(10)->create();

        $categorias = [
            ['name' => 'Bebidas'],
            ['name' => 'Carnes e Frios'],
            ['name' => 'Café da manhã/Padaria'],
            ['name' => 'Mercearia em geral'],
            ['name' => 'Frutas e Legumes'],
        ];

        foreach ($categorias as $categoria){
            Category::create($categoria);
        }

        $produtos = [
            ['name' => 'Cerveja Antarctica Pilsen 350ml Lata', 'brand' => 'Antarctica', 'id_category' => 1],
            ['name' => 'Arroz Prato Fino Tipo 1 5kg', 'brand' => 'Prato Fino', 'id_category' => 4],
            ['name' => 'Pão Francês', 'brand' => null, 'id_category' => 3],
        ];

        foreach ($produtos as $produto){
            Product::create($produto);
        }

        PurchaseFactory::times(5)->create();
    }
}
