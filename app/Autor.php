<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'autores';
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
