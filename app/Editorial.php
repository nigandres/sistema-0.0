<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Editorial extends Model
{
    use HybridRelations;
    protected $connection = 'mysql';
    protected $table = 'editoriales';
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
      return $this->hasMany('App\Libro','id_editorial');
    }

    public function convenios(){
      return $this->hasMany('App\Convenio');
    }
}
