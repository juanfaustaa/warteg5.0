<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsUser extends Model
{
    use HasFactory;

    protected $table = 'ms_users';
    protected $primaryKey = 'userid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['userid', 'username', 'userphonenumber', 'useremail'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($user) {
            $lastUser = MsUser::orderBy('userid', 'desc')->first();
            $number = $lastUser ? ((int) substr($lastUser->userid, 3)) + 1 : 1;
            $user->userid = 'US' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }

    public function TransactionHeaders(){
        return $this->hasMany(transactionHeader::class, 'userid', 'userid');
    }

}
