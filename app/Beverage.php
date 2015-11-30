<?php
/**
 * Created by PhpStorm.
 * User: throckt
 * Date: 11/24/2015
 * Time: 2:06 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    public function reviews() {
        return $this->belongsTo('Beverage');
    }
}