<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    private function getOnlyAccepted()
    {
        return $this->where('status', 'accepted');
    }

    public function scopeHistoryWeek()
    {
        $firstDay = Carbon::now()->startOfWeek();
        $thisWeekHistory = [
            "Monday" => $this->getOnlyAccepted()->where("date", $firstDay)->get()->sum("amount"),
            "Tuesday" => $this->getOnlyAccepted()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Wednesday" => $this->getOnlyAccepted()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Thursday" => $this->getOnlyAccepted()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Friday" => $this->getOnlyAccepted()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Saturday" => $this->getOnlyAccepted()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
            "Sunday" => $this->getOnlyAccepted()->where("date", $firstDay->addDays(1))->get()->sum("amount"),
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
