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
     
        return view('budget');
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

    public function BudgetStatus(){
        $budget = Budget::latest()->first();
        if($budget){
            $startDate = $budget->startDate;
            $endDate = $budget->endDate;

            $expenses = Expense::whereBetween('date', [$startDate, $endDate])->get();
            return view('budget', compact('expenses'));
        }
        else{
            $message = 'No budget has been set.';
            return view('budget', compact('message'));
        }
    }

    public function AmountLeft(){
        $budget = Budget::latest()->first();
        $budgetAmount = $budget['price'];
         if($budget){
            $startDate = $budget->startDate;
            $endDate = $budget->endDate;

            $expenses = Expense::whereBetween('date', [$startDate, $endDate])->get('price');
            $sumofexpenses = $expenses->sum('price');

            $AmountRemaining = $budgetAmount - $sumofexpenses;
            return view('budget', compact('AmountRemaining'));
        }
        else{
            return view('budget')->with('message' , "No budget has been set");
        }
        
      
        
    }
}