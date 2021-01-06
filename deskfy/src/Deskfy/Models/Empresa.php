<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function path()
    {
        return config('deskfy.path') . '/empresa/' . $this->id;
    }

}