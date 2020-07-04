<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadOnlyBase 
{
    //
    protected $titles_arry = [];

    public function all()
    {
    	return $this->titles_arry;
    }

    public function get ($id)
    {
    	return $this->titles_arry[$i];
    }
}
