<?php

namespace App;

use App\Tenant\ForTenant;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use ForTenant;

    protected $table = 'brands';

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
