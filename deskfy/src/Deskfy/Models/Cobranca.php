<?php

namespace Deskfy\Models;

use Deskfy\BaixarCobranca;
use Deskfy\Traits\HasFactory;
use Deskfy\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    use HasFactory, HasFilters;

    const REPETIR_POR_CONDICOES = [
        'd' => 'Dia(s)', 
        'm' => 'Mês(es)', 
        'a' => 'Ano(s)', 
    ];

    const REPETIR_A_CADA_CONDICOES = [
        'd' => 'Dia(s)', 
        'm' => 'Mês(es)', 
        'a' => 'Ano(s)', 
    ];

    protected $guarded = [];

    protected $dates = [
        'vence_em', 
        'paga_em', 
        'enviada_em', 
    ];

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
        return $query->whereNull('paga_em')->whereDate('vence_em', '>=', today());
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
        return $query->whereNotNull('paga_em');
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
        return $query->whereNull('paga_em')->whereDate('vence_em', '<', today());
    }

    /**
     * Retorna todas as cobranças 
     * que são recorrentes
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecorrentes($query)
    {
        return $query->where('recorrente', true);
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
        $this->attributes['valor'] = preg_replace('/\D/', '', $value);
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