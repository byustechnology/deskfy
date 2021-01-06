<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function entidade()
    {
        return $this->belongsTo(Entidade::class);
    }

    public function cobrancas()
    {
        return $this->belongsTo(Cobranca::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/servico/' . $this->id;
    }

}