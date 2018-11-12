<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $connection = 'mysql';
    protected $table = 'carreras';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

  public function centro(){
    return $this->belongsTo('App\Centro');
  }

  public function materias(){
    return $this->hasMany('App\Materia');
  }

  public function alumnos(){
    return $this->hasMany('App\Alumno');
  }

  public function categorias(){
    return $this->belongsToMany('App\Categoria');
  }
}
