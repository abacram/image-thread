<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    protected $fillable = [ 'ip'];
    protected $table = 'trackers';

    public static function hit() {
        static::firstOrCreate([
                  'ip'   => $_SERVER['REMOTE_ADDR'],
              ])->save();
    }
}
