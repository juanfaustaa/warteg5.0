<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transaction_headers';
    protected $primaryKey = 'transactionid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['transactionid', 'transactiondate', 'paymentstatus', 'userid'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($transaction) {
            $lastTransaction = TransactionHeader::orderBy('transactionid', 'desc')->first();
            $number = $lastTransaction ? ((int) substr($lastTransaction->transactionid, 3)) + 1 : 1;
            $transaction->transactionid = 'TRX' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }

    public function MsUser(){
        return $this->belongsTo(MsUser::class, 'userid', 'userid');
    }

    public function TransactionDetails(){
        return $this->hasMany(TransactionDetail::class, 'transactionid', 'transactionid');
    }

    public function getSubtotalAttribute()
    {
        return $this->TransactionDetails->sum(function ($detail) {
            return $detail->quantity * ($detail->MsMenu->menuprice ?? 0);
        });
    }
}
