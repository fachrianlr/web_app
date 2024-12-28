<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'date',
        'amount',
        'note',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getTotalExpense()
    {
        $sql = "SELECT sum(amount) as total FROM transactions tr JOIN categories ca 
                    ON tr.category_id = ca.id WHERE is_expense = true";
        $res = DB::select($sql);
        return $res ? $res[0]->total : 0;
    }

    public static function getTotalIncome()
    {
        $sql = "SELECT sum(amount) as total FROM transactions tr JOIN categories ca 
                    ON tr.category_id = ca.id WHERE is_expense = false";
        $res = DB::select($sql);
        return $res ? $res[0]->total : 0;
    }
}
