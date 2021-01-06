<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/cobranca/' . $this->id;
    }

}