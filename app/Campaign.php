<?php

namespace App;

use App\Tenant\ForTenant;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use ForTenant;

    protected $table = 'campaigns';

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
