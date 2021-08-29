<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingMeeting extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meetings';

    protected $fillable = [
        'user_id',
        'meeting_subject',
        'approved_by',
        'department',
        'description',
        'status',
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