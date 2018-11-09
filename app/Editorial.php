<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $connection = 'mysql';
    protected $table = 'editoriales';
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function libros(){
      return $this->hasMany('App\Libros');
    }

    public function convenios(){
      return $this->hasMany('App\Convenio');
    }
}
