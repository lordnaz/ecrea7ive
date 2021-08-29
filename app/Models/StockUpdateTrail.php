<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockUpdateTrail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'stock_list';

    protected $fillable = ['item', 'sub_item', 'prev_quantity', 'now_quantity', 'prev_price', 'now_price', 'description', 'updated_by_name', 
                            'updated_by_id'];
}
