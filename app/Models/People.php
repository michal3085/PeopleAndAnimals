<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname'];

    public function animals()
    {
        return $this->hasMany('App\Models\Animal');
    }

    /*
     * Method checks if People with given credentials exists.
     */
    public static function peopleExist($surname, $name): int
    {
        if ( People::where('surname', $surname)->where('name', $name)->count() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

}
