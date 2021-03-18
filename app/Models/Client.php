<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'phone'];

    public function company()
    {
        return $this->belongsToMany(
            Company::class,
            'client_company'
        );
    }

    public static function updateClient($request, $id)
    {
        $client = self::where('id', $id)->first();
        $client->company()->detach();
        $client->update($request->except(['_token', 'id', '_method', 'company']));
        $client->company()->attach($request->get('company'));
    }
}
