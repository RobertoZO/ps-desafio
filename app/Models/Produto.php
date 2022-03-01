<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
  use HasFactory;

  protected $fillable = [
    'nome', 'preco', 'descricao', 'quantidade', 'imagem', 'categoria_id'       
  ];
}
