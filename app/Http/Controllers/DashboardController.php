<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\ExpenseController;
// use DB;
use App\Expense;
use App\Income;



class DashboardController extends Controller
{
    public function index()
    {
       $categorizedData = $this->CategorizedData();

    // Income Displaying
    $todayIncome = $this->TodaysIncome();
    $weeklyIncome = $this->WeeklyIncome();
    $monthlyIncomes = $this->MonthlyIncome();
    $yearlyIncome = $this->YearlyIncome();

    // Expense Displaying
    $todaysExpense = $this->TodaysExpense();
    $weeklyExpense = $this->WeeklyExpense();
    $monthlyExpense = $this->MonthlyExpense();
    $yearlyExpense = $this->YearlyExpense();

    // Ratio Displaying
    $income_ratio = $this->TotalIncomeRation();
    $expense_ratio = $this->TotalExpenseRatio();

    // Return the view with all the data
    return view('welcome', compact(
        'categorizedData',
        'todayIncome',
        'weeklyIncome',
        'monthlyIncomes',
        'yearlyIncome',
        'todaysExpense',
        'weeklyExpense',
        'monthlyExpense',
        'yearlyExpense',
        'income_ratio',
        'expense_ratio'
    ));
    }


    // Income Functions 
public function TodaysIncome()
{
      $today = Carbon::today();
      $todaysIncome = Income::whereDate('date', $today)->get();
      return $todaysIncome;
}


    public function WeeklyIncome()
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6);
        $weeklyIncomes = Income::whereBetween('date', [$startDate, $endDate])->get();
        return $weeklyIncomes;
    }

    public function MonthlyIncome(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(29);
        $monthlyIncomes = Income::whereBetween('date', [$startDate, $endDate])->get();
        return $monthlyIncomes;
    }

    public function YearlyIncome(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(365);
        $yearlyIncomes = Income::whereBetween('date', [$startDate, $endDate])->get();
        return $yearlyIncomes;
    }




    // // Expense Functions

    public function TodaysExpense()
    {
        $today = Carbon::today();
        $expenses = Expense::whereDate('date', $today)->get();
        return $expenses;
    }
    
    public function WeeklyExpense()
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6);
        $weeklyExpenses = Expense::whereBetween('date', [$startDate, $endDate])->get();
        return $weeklyExpenses;
    }

    public function MonthlyExpense(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(29);
        $monthlyExpenses = Expense::whereBetween('date', [$startDate, $endDate])->get();
        return $monthlyExpenses;
    }

    public function YearlyExpense(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(365);
        $yearlyExpenses = Expense::whereBetween('date', [$startDate, $endDate])->get();
        return $yearlyExpenses;
    }



    // // Visualization of the Data

    public function TotalIncomeRation(){
        $totalIncome = Income::sum('price');
        return $totalIncome;
    }

    public function TotalExpenseRatio(){
        $totalExpense = Expense::sum('price');
        return $totalExpense;
    }


    public function CategorizedData(){
    $incomeCategory = Income::get(['description', 'price']);
    $expenseCategory = Expense::get(['description', 'price']);
    return  ['incomeStats' => $incomeCategory, 'expenseStats' => $expenseCategory];
    }

    // public function CategorizeIncome(){
        
    // }

    // public function CategorizedExpense(){
    //     $Expcategory = DB::table('exp_record')->get(['description', 'price']);
    //     return view('stats',['Expstats'=>$Expcategory]);
    // }


}