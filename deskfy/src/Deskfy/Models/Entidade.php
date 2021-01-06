<?php

namespace Deskfy\Models;


use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/entidade/' . $this->id;
    }

}