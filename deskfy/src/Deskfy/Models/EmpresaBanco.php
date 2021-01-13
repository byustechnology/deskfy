<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class EmpresaBanco extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function path()
    {
        return $this->empresa . '/banco/' . $this->id;
    }

    public function setAgenciaAttribute($value)
    {
        $this->attributes['agencia'] = preg_replace('/\D/', '', $value);
    }

    public function setContaAttribute($value)
    {
        $this->attributes['conta'] = preg_replace('/\D/', '', $value);
    }

    public function setCarteiraAttribute($value)
    {
        $this->attributes['carteira'] = preg_replace('/\D/', '', $value);
    }

}