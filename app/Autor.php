<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'autores';
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }
    
    //Autor __has_many__ libros
    public function libros(){
      return $this->hasMany('App\libros');
    }
}
