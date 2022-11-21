<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    private function getOnlyExpense()
    {
        return $this->where('status', 'accepted');
    }

    public function scopeHistoryWeek()
    {
        $firstDay = Carbon::now()->startOfWeek();
        $thisWeekHistory = [
            "Monday" => $this->getOnlyExpense()->where("date", $firstDay)->get()->sum("amount"),
            "Tuesday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Wednesday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Thursday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Friday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Saturday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Sunday" => $this->getOnlyExpense()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
        ];

        return collect(["history" => $thisWeekHistory])->toJson();
        // return $thisWeekHistory;
    }

    // public function scopeTestGet()
    // {
    //     $firstDay = Carbon::now()->startOfWeek();

    //     // return $this->where('status', 'accepted')->get()->sum("amount");
    //     return $this->where('status', 'accepted')->where("date", $firstDay)->get()->sum("amount");
    // }





    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }   
}
