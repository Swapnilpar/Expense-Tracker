<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use Carbon\Carbon;
use App\Expense;
use Illuminate\Support\Facades\Redirect;

class BudgetController extends Controller
{
    public function index(){
        $budget = Budget::latest()->first();
        $expenses = collect();
        $AmountRemaining = 0;

        if($budget){
            $startDate = $budget->startDate;
            $endDate = $budget->endDate;
            $budgetAmount = $budget->price;

            $expenses = Expense::whereBetween('date', [$startDate, $endDate])->get();
            $sumofexpenses = $expenses->sum('price');
            $AmountRemaining = $budgetAmount - $sumofexpenses;

            switch(true){
                case($AmountRemaining == 0): 
                    $alertMessage = "Alert: Your budget is over!!!";
                    break;
                case($AmountRemaining <= 0.1 * $budgetAmount):
                    $alertMessage = "Alert: You have used 90% of your budget amount!!!";
                    break;
                case($AmountRemaining <= 0.2 * $budgetAmount):
                    $alertMessage = "Alert: You have used 80% of your budget amount!!!";
                    break;
                case($AmountRemaining <= 0.3 * $budgetAmount):
                    $alertMessage = "Alert: You have used 70% of your budget amount!!!";
                    break;
            }
        }
        
        return view('budget', compact('expenses', 'AmountRemaining', 'budgetAmount', 'alertMessage', 'sumofexpenses'));
         }

    public function PostBudget(Request $request){
        $query = new Budget();
            $query->startDate = $request->input('startDate');
            $query->endDate = $request->input('endDate');
            $query->price = $request->input('price');
            $query->save();
        if($query->id){
            return back()->with('success', 'Budget Added successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
    }

  
    // public function BudgetStatus(){
    //     $budget = Budget::latest()->first();
    //     if($budget){
    //         $startDate = $budget->startDate;
    //         $endDate = $budget->endDate;

    //         $expenses = Expense::whereBetween('date', [$startDate, $endDate])->get();
    //         return view('budget', compact('expenses'));
    //     }
    //     else{
    //         $message = 'No budget has been set.';
    //         return view('budget', compact('message'));
    //     }
    // }

    // public function AmountLeft(){
    //     $budget = Budget::latest()->first();
    //     $budgetAmount = $budget['price'];
    //      if($budget){
    //         $startDate = $budget->startDate;
    //         $endDate = $budget->endDate;

    //         $expenses = Expense::whereBetween('date', [$startDate, $endDate])->get('price');
    //         $sumofexpenses = $expenses->sum('price');

    //         $AmountRemaining = $budgetAmount - $sumofexpenses;
    //         return view('budget', compact('AmountRemaining'));
    //     }
    //     else{
    //         return view('budget')->with('message' , "No budget has been set");
    //     }
        
      
        
    // }
}