<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Linkable;
    protected $guarded = [];
    
    //db ile tweet ve user tabloları arası ilişki kur
    public function user() 
    {
        return $this -> belongsTo(User::class);
    }

    

}
