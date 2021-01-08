<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    use HasFactory, HasFilters;

    const TIPOS = [
        'j' => 'Pessoa jurídica', 
        'f' => 'Pessoa física', 
    ];

    protected $guarded = [];

    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/entidade/' . $this->id;
    }

}