<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    
    public function scopeNombres($query, $nombres)
    {
    	# code...
    	if ($nombres) {
    		return $query->where('nombres', 'like', "%$nombres%");
    	}
    }

    public function scopeApellidos($query, $apellidos)
    {
    	# code...
    	if ($apellidos) {
    		return $query->where('apellidos', 'like', "%$apellidos%");
    	}
    }

    public function scopeBuscarpor($query, $tipo, $buscar)
    {
    	if ( ($tipo) && ($buscar) ) {
    		return $query->where($tipo, 'like', "%$buscar%");
    	}
    }
}
