<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function banco()
    {
        return $this->hasOne(EmpresaBanco::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/empresa/' . $this->id;
    }

    /**
     * Remove qualquer caractér que 
     * não seja número do campo documento.
     * 
     * @param  string  $value
     * @return integer
     */
    public function setDocumentoAttribute($value)
    {
        $this->attributes['documento'] = preg_replace('/\D/', '', $value);
    }

}