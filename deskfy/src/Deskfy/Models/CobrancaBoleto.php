<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class CobrancaBoleto extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function cobranca()
    {
        return $this->belongsTo(Cobranca::class);
    }

    public function path()
    {
        return $this->cobranca->path() . '/cobranca/' . $this->id;
    }
}