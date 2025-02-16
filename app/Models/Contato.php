<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contatos';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'localidade',
        'uf',
    ];

    protected $appends = ['endereco'];

    public function getEnderecoAttribute()
    {
        $numero = $this->numero ?? 'S/N';
        $complemento = $this->complemento ? ' ' . $this->complemento : '';
        return "{$this->logradouro}, {$numero}{$complemento}. {$this->localidade}/{$this->uf} - {$this->cep}";
    }
}
