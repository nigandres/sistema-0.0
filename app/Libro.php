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
    //Libro __belongs_to__ Autor
    public function autor(){
      return $this->belongsTo('App\Autor');
    }

    //Libro __belongs_to__ Editorial
    public function editorial(){
      return $this->belongsTo('App\Editorial');
    }
}
