<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class EntidadeEmail extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function entidade()
    {
        return $this->belongsTo(Entidade::class);
    }

    public function path()
    {
        return $this->entidade->path() . '/email/' . $this->id;
    }

}