<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leaves';

     
    protected $fillable = [
        'name',
        'leaves_status',
        'user_id',
        'startdate',
        'enddate',
        
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('migration', 'like', '%'.$query.'%')
                ->orWhere('batch', 'like', '%'.$query.'%');
    }


}