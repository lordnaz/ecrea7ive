<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StockList as Stocklist;
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

        $jan = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-01-01', '2021-01-31'])
                                    ->sum('now_price');

        $feb = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-02-01', '2021-02-31'])
                                    ->sum('now_price');
        
        $mar = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-03-01', '2021-03-31'])
                                    ->sum('now_price');

        $apr = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-04-01', '2021-04-31'])
                                    ->sum('now_price');

        $may = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-05-01', '2021-05-31'])
                                    ->sum('now_price');

        $jun = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-06-01', '2021-06-31'])
                                    ->sum('now_price');

        $jul = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-07-01', '2021-07-31'])
                                    ->sum('now_price');

        $aug = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-08-01', '2021-08-31'])
                                    ->sum('now_price');
        
        $sep = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-09-01', '2021-09-31'])
                                    ->sum('now_price');

        $oct = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-10-01', '2021-10-31'])
                                    ->sum('now_price');

        $nov = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-11-01', '2021-11-31'])
                                    ->sum('now_price');

        $dec = StockUpdateTrail::orderBy('id', 'desc')
                                    ->whereBetween('created_at', ['2021-12-01', '2021-12-31'])
                                    ->sum('now_price');
        // return $datas;

        // die();
        $costing = [
            'jan' => $jan,
            'feb' => $feb,
            'mar' => $mar,
            'apr' => $apr,
            'may' => $may,
            'jun' => $jun,
            'jul' => $jul,
            'aug' => $aug,
            'sep' => $sep,
            'oct' => $oct,
            'nov' => $nov,
            'dec' => $dec,
        ];

        $costing = (object)$costing;

        return view('components.transaction_main', compact('datas', 'costing'));

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
