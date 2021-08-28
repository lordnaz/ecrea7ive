<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockList extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'stock_list';

    protected $fillable = ['item', 'sub_item', 'quantity', 'updated_by_name', 
                            'updated_by_id'];
}
