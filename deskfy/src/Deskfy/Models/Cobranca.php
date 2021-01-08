<?php

namespace Deskfy\Models;

use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    use HasFactory, HasFilters;

    protected $guarded = [];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function entidade()
    {
        return $this->belongsTo(Entidade::class);
    }

    public function arquivos()
    {
        return $this->hasMany(CobrancaArquivo::class);
    }

    public function path()
    {
        return config('deskfy.path') . '/cobranca/' . $this->id;
    }

    /**
     * Retorna todas as cobranças 
     * que estão em aberto no sistema.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAbertas($query)
    {
        return $query->whereNull('pago_em')->whereDate('vence_em', '>=', today());
    }
    /**
     * Retorna todas as cobranças 
     * que já foram pagas.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePagas($query)
    {
        return $query->whereNotNull('pago_em');
    }

    /**
     * Retorna todas as cobranças 
     * que estão vencidas.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVencidas($query)
    {
        return $query->whereNull('pago_em')->whereDate('vence_em', '<', today());
    }

    /**
     * Converte o valor para 
     * centavos, antes de salvar 
     * o recurso na base de dados.
     * 
     * @param  integer  $value
     */
    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = $value * 100;
    }

    /**
     * Retorna o valor da cobrança 
     * em reais (é saldo em centavos 
     * na base de dados).
     * 
     * @param  integer  $value
     * @return float
     */
    public function getValorAttribute($value)
    {
        return $value / 100;
    }

}