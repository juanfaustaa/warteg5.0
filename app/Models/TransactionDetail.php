<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $primaryKey = ['transactionid', 'menuid'];
    public $incrementing = false;
    protected $fillable = ['transactionid', 'menuid', 'quantity'];

    protected $appends = ['key'];

    public function getKeyAttribute(): string
    {
        return $this->transactionid . '-' . $this->menuid;
    }

    public function TransactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class, 'transactionid', 'transactionid');
    }

    public function MsMenu()
    {
        return $this->hasOne(MsMenu::class, 'menuid', 'menuid');
    }

    public function getKeyName()
    {
        return 'transactionid';
    }
}
