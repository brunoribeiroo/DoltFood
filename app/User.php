<?php

namespace cardapio;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
  protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'login_user','login_tipo', 'login_nome', 'login_email', 'login_password',
    ];
    protected $table ='login';
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'login_password', 'remember_token',
    ];
    public function getId()
    {
     return $this->id;
    }
}
