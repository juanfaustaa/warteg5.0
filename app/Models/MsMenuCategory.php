<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsMenuCategory extends Model
{
    use HasFactory;
    
    protected $table = 'ms_menu_categories';
    protected $primaryKey = 'menucategoryid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['menucategoryid', 'menucategoryname'];

    protected static function boot(){
        parent::boot();
        static::creating(function ($category) {
            $lastCategory = MsMenuCategory::orderBy('menucategoryid', 'desc')->first();
            $number = $lastCategory ? ((int) substr($lastCategory->menucategoryid, 3)) + 1 : 1;
            $category->menucategoryid = 'CAT' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }

    public function MsMenus(){
        return $this->hasMany(MsMenu::class, 'menucategoryid', 'menucategoryid');
    }
}
