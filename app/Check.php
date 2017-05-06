<?php

namespace CheckoMatic;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
      'bank','recipient','amount','validUntil'
    ];

    protected $table = 'checks';

    protected $dates = [
      'validUntil','created_at','updated_at'
    ];

    protected $guarded = [

    ];
}
