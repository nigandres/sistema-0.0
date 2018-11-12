<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
	protected $connection = 'mysql';
    protected $table = 'convenios';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function editorial(){
      return $this->belongsTo('App\Editorial');
    }

    public function centros(){
      return $this->belongsToMany('App\Centro');
    }
}
