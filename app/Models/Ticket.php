<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'tickets';

    protected $fillable = ['ticket_id', 'job_name', 'job_status', 'job_type', 
                            'references', 'description', 'delivery_type', 'dateline', 
                            'pic_name', 'pic_email', 'pic_contact_no', 'pic_office_no',
                            'pic_address', 'pic_postcode', 'created_by'];

}
