<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Libro extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'libros';
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->collection;
    }

    public function autores(){
      return $this->belongsToMany('App\Autor');
    }

    public function categoria(){
      return $this->belongsTo('App\Categoria');
    }

    public function materias(){
      return $this->belongsToMany('App\Materia');
    }

    public function editorial(){
      return $this->belongsTo('App\Editorial');
    }
}
