<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    use HasFactory;

    public function scopeAllTotal()
    {
        $totalProduct = $this->where("user_id", auth()->user()->id)
            ->whereBetween("date", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereHas("category", function ($q) {
                $q->whereHas("type", function ($q) {
                    $q->where("name", "EXPENSE");
                });
            })->oldest()->get();

        // $expenseMonth = $this->where("user_id", auth()->user()->id)
        //     ->whereBetween("date", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        //     ->whereHas("category", function ($q) {
        //         $q->whereHas("type", function ($q) {
        //             $q->where("name", "EXPENSE");
        //         });
        //     })->oldest()->get();

        // $incomeWeek = $this->where("user_id", auth()->user()->id)
        //     ->whereBetween("date", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        //     ->whereHas("category", function ($q) {
        //         $q->whereHas("type", function ($q) {
        //             $q->where("name", "INCOME");
        //         });
        //     })->oldest()->get();

        // $incomeMonth = $this->where("user_id", auth()->user()->id)
        //     ->whereBetween("date", [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        //     ->whereHas("category", function ($q) {
        //         $q->whereHas("type", function ($q) {
        //             $q->where("name", "INCOME");
        //         });
        //     })->oldest()->get();


        // return collect([
        //     "totalExpenseWeek" => $expenseWeek->sum("amount"),
        //     "totalExpenseMonth" => $expenseMonth->sum("amount"),
        //     "totalIncomeWeek" => $incomeWeek->sum("amount"),
        //     "totalIncomeMonth" => $incomeMonth->sum("amount"),
        // ]);
    }

}
