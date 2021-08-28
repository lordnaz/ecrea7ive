<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stocklist;

class InventoryController extends Controller
{
    //
    public function index ()
    {

        $stocklist = Stocklist::orderBy('id', 'asc')->get();

        return view('components.inventory_main', compact('stocklist'));

        // return view('components.inventory_main', [
        //     'inventory' => Inventory::class
        // ]);
        
    }

    
    
}
