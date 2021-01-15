<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Remessa extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function boletos()
    {
        return $this->hasMany(CobrancaBoleto::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/remessa/' . $this->id;
    }
}