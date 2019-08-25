<?php

namespace Rolcito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Race extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
