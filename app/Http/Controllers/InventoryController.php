<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stocklist;
use App\Models\StockUpdateTrail;

use Increment;

class InventoryController extends Controller
{
    //
    public function index()
    {

        $stocklist = Stocklist::orderBy('id', 'asc')->get();

        $stock_trail = StockUpdateTrail::orderBy('id', 'desc')->get();

        return view('components.inventory_main', compact('stocklist', 'stock_trail'));

        // return view('components.inventory_main', [
        //     'inventory' => Inventory::class
        // ]);
        
    }

    public function all_transaction()
    {

        // $stocklist = Stocklist::orderBy('id', 'asc')->get();

        $datas = StockUpdateTrail::orderBy('id', 'desc')->get();

        // return $datas;

        // die();

        return view('components.transaction_main', compact('datas'));

        // return view('components.inventory_main', [
        //     'inventory' => Inventory::class
        // ]);
        
    }

    public function add_stock(Request $req){

        $data = $req->input();

        $split_item = explode("|",$req->stock_name);

        $item = $split_item[0];
        $sub_item = $split_item[1];

        $currentdt = date('Y-m-d H:i:s');

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;

        // update stock list first 
        if($sub_item != null){

            // $update_quantity = Stocklist::where('item', $item)
            //                             ->where('sub_item', $sub_item)
            //                             ->increment('quantity', $req->quantity);
                
            $update_stock = Stocklist::where('item', $item)
                                ->where('sub_item', $sub_item)
                                ->update([
                                    'quantity' => $req->quantity,
                                    'updated_by_name' => $uname,
                                    'updated_by_id' => $uuid, 
                                    'updated_at' => $currentdt
                                ]);
        }else{

            // $update_quantity = Stocklist::where('item', $item)
            //                             ->increment('quantity', $req->quantity);

            $update_stock = Stocklist::where('item', $item)
                                ->update([
                                    'quantity' => $req->quantity,
                                    'updated_by_name' => $uname,
                                    'updated_by_id' => $uuid, 
                                    'updated_at' => $currentdt
                                ]);
        }

        return redirect()->route('inventory');

    }

    public function add_transaction(Request $req){
        $data = $req->input();

        $split_item = explode("|",$req->stock_name);

        $item = $split_item[0];
        $sub_item = $split_item[1];

        $currentdt = date('Y-m-d H:i:s');

        $uuid = auth()->user()->id;
        $uname = auth()->user()->name;

        // get last transaction now_price and now_quantity 
        if($sub_item != null){
            $stock_trail = StockUpdateTrail::where('item', $item)
                                    ->where('sub_item', $sub_item)
                                    ->orderBy('id', 'desc')
                                    ->first();

        }else{
            $stock_trail = StockUpdateTrail::where('item', $item)
                                    ->orderBy('id', 'desc')
                                    ->first();
        }

        if($stock_trail){
            // now_price and now_quantity of last transaction will be the previous record of new transaction 
            $prev_qty = $stock_trail->now_quantity;
            $prev_price = $stock_trail->now_price;
        }else{
            $prev_qty = 0;
            $prev_price = 0;
        }

        // then add info into stock trail list 
        $transaction = StockUpdateTrail::create([
            'item' => $item,
            'sub_item' => $sub_item,
            'prev_quantity' => $prev_qty,
            'now_quantity' => $req->quantity,
            'prev_price' => $prev_price,
            'now_price' => $req->price,
            'description' => $req->description,
            'updated_by_name' => $uname,
            'updated_by_id' => $uuid,
        ]);

        return redirect()->route('inventory');
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
