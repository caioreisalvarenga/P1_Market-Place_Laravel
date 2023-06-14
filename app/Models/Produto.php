<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_categoria',
        'id_user',
        'nome',
        'descricao',
        'preco',
        'imagem',
        'slug',
    ];

    protected $table = 'produtos';

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
