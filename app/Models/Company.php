<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;

    public function client()
    {
        return $this->belongsToMany(Client::class, 'client_company');
    }
}
