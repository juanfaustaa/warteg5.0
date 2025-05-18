<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $fillable = ['transactionid', 'menuid', 'quantity'];

    public function TransactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class, 'transactionid', 'transactionid');
    }

    public function MsMenu()
    {
        return $this->hasOne(MsMenu::class, 'menuid', 'menuid');
    }
}
