<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $roles = [
        "Membre", "Partenaire", "Moderateur", "Admin", "AdminDebug"
    ];

    public function avatarURL(){
        return url('api/upload/avatars/'.$this->avatar);
    }

    public function roleName(){
        return $this->roles[$this->role];
    }

    public function formatName(){
        return htmlspecialchars($this->name) . (($this->isModerator()) ? ' <div class="tooltip"><i class="fas fa-tools"></i><span class="tooltiptext">Membre de l\'Equipe</span></div>' : '');
    }

    public function isModerator(){
        return $this->role >= Role::Moderator;
    }

    public function isAdmin(){
        return $this->role >= Role::Admin;
    }

    public function hasDebug(){
        return $this->role >= Role::AdminDebug;
    }

    public function reacts(){
        return $this->hasMany('App\React');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

}
