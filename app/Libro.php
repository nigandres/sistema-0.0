<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

// class Libro extends Model
class Libro extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'libros';
    // protected $connection = 'mysql';
    // protected $table = 'libros';
    protected $hidden = ['_id','timestamps'];
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->collection;
        // return $this->table;
    }

    public function autores(){
      return $this->belongsToMany('App\Autor');
    }

    public function categoria(){
      return $this->belongsTo('App\Categoria','id_categoria');
    }

    public function materias(){
      return $this->belongsToMany('App\Materia');
    }

    public function editorial(){
      return $this->belongsTo('App\Editorial','id_editorial');
    }
}
