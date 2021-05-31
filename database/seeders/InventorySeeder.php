<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $inventory1 = new Inventory();
        $inventory1->name = "Chair";
        $inventory1->quantity = "20";
        $inventory1->description = "Chair For Kids";
        $inventory1->save();

        $inventory2 = new Inventory();
        $inventory2->name = "Laptop";
        $inventory2->quantity = "60";
        $inventory2->description = "High End Laptop";
        $inventory2->save();

        $inventory1 = new Inventory();
        $inventory1->name = "Microwave";
        $inventory1->quantity = "120";
        $inventory1->description = "Lightweight Microwave";
        $inventory1->save();
    }
}
