<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class usuario extends Model implements AuthenticatableContract, CanResetPasswordContract {


    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
      */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name', 'password', 'app_pass', 'nivel'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password','remember_token'];
    protected $guarded = ['id'];


    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }



    public function getPasswordAttribute() {
        return $this-> attributes['password'];
    }

    public function setPasswordAttribute($password) {
        $this->password= Hash::make($password);
    }
}
