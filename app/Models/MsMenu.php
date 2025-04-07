<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class MsMenu extends Model
{
    protected $table = 'ms_menus';
    protected $primaryKey = 'menuid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['menuid', 'menuname', 'menuprice', 'menuimage', 'menucategoryid'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($menu) {
            $lastMenu = MsMenu::orderBy('menuid', 'desc')->first();
            if ($lastMenu && preg_match('/\d+/', $lastMenu->menuid, $matches)) {
                $number = (int) $matches[0] + 1;
            } else {
                $number = 1;
            }
            $menu->menuid = 'FD' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }

    public function MsMenuCategory()
    {
        return $this->belongsTo(MsMenuCategory::class, 'menucategoryid', 'menucategoryid');
    }

    public function TransactionDetails(){
        return $this->hasMany(TransactionDetail::class, 'menuid', 'menuid');
    }

    public function getAllMenus(){
        return DB::table('ms_menus')
            ->select('ms_menus.*')
            ->get();
    }
}
