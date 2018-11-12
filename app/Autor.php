<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Autor extends Model
{
    use HybridRelations;
    protected $connection = 'pgsql';
    protected $table = 'autores';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function libros(){
      return $this->belongsToMany('App\Libro');
    }

    public function categorias(){
      return $this->belongsToMany('App\Categoria');
    }
}
