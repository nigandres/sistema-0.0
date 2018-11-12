<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $connection = 'mysql';
    protected $table = 'materias';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function carrera(){
      return $this->belongsTo('App\Carrera');
    }

    public function alumnos(){
      return $this->belongsToMany('App\Alumno');
    }

    public function libros(){
      return $this->belongsToMany('App\Libro');
    }
}
