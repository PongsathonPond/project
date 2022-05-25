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

    public function booktolocation()
    {

        return $this->hasMany(Location::class, 'location_id', 'location_id');

    }

    public function booktouser()
    {

        return $this->hasMany(User::class, 'id', 'user_id');

    }
}
