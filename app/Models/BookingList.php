<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingList extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'location_id',
        'project_cost',
        'project_name',
        'agency',
        'club_name',
        'start',
        'end',
        'status',
        'status_cost',
        'file_document',
        'title',

    ];
}
