<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stocklist;
use App\Models\StockUpdateTrail;

class InventoryController extends Controller
{
    //
    public function index()
    {

        $stocklist = Stocklist::orderBy('id', 'asc')->get();

        return view('components.inventory_main', compact('stocklist'));

        // return view('components.inventory_main', [
        //     'inventory' => Inventory::class
        // ]);
        
    }

    public function add_stock(){

    }

    public function init_state(){

        $datas = array (
            array("ANNUAL REPORT",null),
            array("ART CARD","260gsm - A3+"),
            array("ART PAPER","128gsm - A3"),
            array("ART PAPER","128gsm - A3+"),
            array("ART PAPER","157gsm - A3"),
            array("ART PAPER","157gsm - A3+"),
            array("COMPANY PROFILE",null),
            array("CONQUEROR",null),
            array("ENVELOPE","SDGB (A3+)"),
            array("ENVELOPE","SDGB (A4)"),
            array("ENVELOPE","SDGB (A4+)"),
            array("ENVELOPE","SDGB (WINDOW)"),
            array("ENVELOPE","ENVELOPE - SDHB (A3+)"),
            array("ENVELOPE","ENVELOPE - SDHB (A4)"),
            array("ENVELOPE","ENVELOPE - SDHB (A4+)"),
            array("ENVELOPE","ENVELOPE - SDHB (WINDOW)"),
            array("ENVELOPE","ENVELOPE - SDIL (A3+)"),
            array("ENVELOPE","ENVELOPE - SDIL (A4)"),
            array("ENVELOPE","ENVELOPE - SDIL (A4+)"),
            array("ENVELOPE","ENVELOPE - SDIL (WINDOW)"),
            array("ENVELOPE","SDSB (A3+)"),
            array("ENVELOPE","SDSB (A4)"),
            array("ENVELOPE","SDSB (A4+)"),
            array("ENVELOPE","SDSB (WINDOW)"),
            array("IVORY CARD","CREAM"),
            array("IVORY CARD","WHITE"),
            array("LETTERHEAD","EMIRTECH"),
            array("LETTERHEAD","ENERTECH"),
            array("LETTERHEAD","SDAE"),
            array("LETTERHEAD","SDGB"),
            array("LETTERHEAD","SDHB"),
            array("LETTERHEAD","SDIL"),
            array("LETTERHEAD","SDSB"),
            array("NOTEBOOK ","A4"),
            array("NOTEBOOK ","A6"),
            array("PLASTIC BINDING","10mm"),
            array("PLASTIC BINDING","14mm"),
            array("PLASTIC BINDING","8mm"),
            array("SIMILI ","A3"),
            array("SIMILI ","A4"),
            array("WIRE BINDING","14.3mm"),
            array("WIRE BINDING","16mm"),
            array("WIRE BINDING","19mm"),
            array("WIRE BINDING","25.4mm")
        );


        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;
        $currentdt = date('Y-m-d H:i:s');

        foreach ($datas as $data) {
            $ticket = Stocklist::create([
                'item' => $data[0],
                'sub_item' => $data[1],
                'quantity' => "0",
                'updated_by_name' => $uname,
                'updated_by_id' => $uuid,
                'created_at' => $currentdt,
                'updated_at' => $currentdt,
            ]);
        }

        return $datas;
    }

    
    
}
