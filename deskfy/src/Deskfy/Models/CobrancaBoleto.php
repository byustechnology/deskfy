<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;
use Storage;

class CobrancaBoleto extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        // Model observer para remover o arquivo quando 
        // o recurso for removido da aplicação.
        static::deleting(function(Model $model) {
            Storage::delete($model->caminho);
        });
    }

    public function cobranca()
    {
        return $this->belongsTo(Cobranca::class);
    }

    public function remessa()
    {
        return $this->belongsTo(Remessa::class);
    }

    public function path()
    {
        return $this->cobranca->path() . '/boleto/' . $this->id;
    }

    public function storagePath()
    {
        return config('deskfy.path') . '/storage/' . $this->caminho . $this->arquivo;
    }

    public function scopeNaoPossuiRemessaAtribuida($query)
    {
        return $query->whereDoesntHave('remessa');
    }
}