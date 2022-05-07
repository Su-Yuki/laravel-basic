<?php

namespace App;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;


// --------------------------------------------------------------------------------
class Person extends Model
{
  // ---[ relation ]---------------------------------------------------------------
  public function boards()
  {
    return $this->hasMany("App\Board");
  }

  // ---[        ]-----------------------------------------------------------------
  protected $guarded = array("id");

  public static $rules = array(
    "name" => "required",
    "mail" => "email",
    "age"  => "integer|min:0|max:150"
  );

  // ---[ global ]-----------------------------------------------------------------
  public static function boot()
  {
    parent::boot();

    // static::addGlobalScope("age", function(EloquentBuilder $builder){
    //   $builder->where("age", ">", 10);
    // });

    static::addGlobalScope(new ScopePerson);
  }

  // ---[        ]-----------------------------------------------------------------
  public function getData()
  {
    return $this->id. ": ". $this->name. "(". $this->age .")";
  }

  public function scopeNameEqual($query, $str)
  {
    return $query->where("name", $str);
  }

  public function scopeAgeGreaterThan($query, $n)
  {
    return $query->where("age", ">=", $n);
  }

  public function scopeAgeLessThan($query, $n)
  {
    return $query->where("age", "<=", $n);
  }

  // ---[        ]-----------------------------------------------------------------
}
