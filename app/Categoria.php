<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Categoria extends Model
{
    use HybridRelations;
    protected $connection = 'pgsql';
    protected $table = 'categorias';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function autores(){
      return $this->belongsToMany('App\Autor');
    }

    public function libros(){
    	return $this->hasMany('App\Libro','id_categoria');
    }

    public function carreras(){
      return $this->belongsToMany('App\Carrera');
    }
}
