<?php namespace Acme\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{

    //public $timestamps = false;

    public function testimonials()
    {
        return $this->hasMany('Acme\models\Testimonial');
    }
}
