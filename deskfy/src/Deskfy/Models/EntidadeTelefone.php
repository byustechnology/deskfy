<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class EntidadeTelefone extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function entidade()
    {
        return $this->belongsTo(Entidade::class);
    }

    public function path()
    {
        return $this->entidade->path() . '/telefone/' . $this->id;
    }

    /**
     * Remove qualquer caractér que 
     * não seja número do campo telefone.
     * 
     * @param  string  $value
     * @return integer
     */
    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = preg_replace('/\D/', '', $value);
    }

}