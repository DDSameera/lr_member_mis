<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'dob', 'gender', 'contact_no'
    ];

    public  function user() : BelongsTo
    {
        return $this->belongsTo('App\User','user_id');
    }
}
