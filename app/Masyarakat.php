<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'nik';

    protected $guard = 'masyarakat';

    protected $fillable = [
        'nik', 'nama','telp','username' ,'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
