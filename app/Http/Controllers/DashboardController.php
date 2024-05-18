<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\ExpenseController;
use DB;



class DashboardController extends Controller
{
    public function index()
    {
        // Income Displaying: 
        $todayIncome = $this->TodaysIncome();
        $weeklyIncome = $this->WeeklyIncome();
        $monthlyIncomes = $this->MonthlyIncome();
        $yearlyIncome = $this->YearlyIncome();


        // Expense Displaying:
        $todaysExpense = $this->TodaysExpense();
        $weeklyExpense = $this->WeeklyExpense();
        $monthlyExpense = $this->MonthlyExpense();
        $yearlyExpense = $this->YearlyExpense();
        

        // Ratio Displaying
        $income_ratio = $this->TotalIncomeRation();
        $expense_ratio = $this->TotalExpenseRatio();



        return view('welcome', compact('todayIncome', 
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
        $incomes = DB::table('inc_record')->whereDate('date', $today)->get();
        $totalIncome = $incomes->sum('price');
        return $incomes;
    }

    public function WeeklyIncome()
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6);
        $weeklyIncomes = DB::table('inc_record')->whereBetween('date', [$startDate, $endDate])->get();
        $totalWeeklyIncome = $weeklyIncomes->sum('price');
        return $weeklyIncomes;
    }

    public function MonthlyIncome(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(29);
        $monthlyIncomes = DB::table('inc_record')->whereBetween('date', [$startDate, $endDate])->get();
        $totalMonthlyIncome = $monthlyIncomes->sum('price');
        return $monthlyIncomes;
    }

    public function YearlyIncome(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(365);
        $yearlyIncomes = DB::table('inc_record')->whereBetween('date', [$startDate, $endDate])->get();
        $totalYearlyIncome = $yearlyIncomes->sum('price');
        return $yearlyIncomes;
    }




    // Expense Functions

    public function TodaysExpense()
    {
        $today = Carbon::today();
        $expenses = DB::table('exp_record')->whereDate('date', $today)->get();
        $totalExpense = $expenses->sum('price');
        return $expenses;
    }
    
    public function WeeklyExpense()
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(6);
        $weeklyExpenses = DB::table('exp_record')->whereBetween('date', [$startDate, $endDate])->get();
        $totalWeeklyExpense = $weeklyExpenses->sum('price');
        return $weeklyExpenses;
    }

    public function MonthlyExpense(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(29);
        $monthlyExpenses = DB::table('exp_record')->whereBetween('date', [$startDate, $endDate])->get();
        $totalMonthlyExpense = $monthlyExpenses->sum('price');
        return $monthlyExpenses;
    }

    public function YearlyExpense(){
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(365);
        $yearlyExpenses = DB::table('exp_record')->whereBetween('date', [$startDate, $endDate])->get();
        $totalYearlyExpense = $yearlyExpenses->sum('price');
        return $yearlyExpenses;
    }



    // Visualization of the Data

    public function TotalIncomeRation(){
        $totalIncome = DB::table('inc_record')->sum('price');
        return $totalIncome;
    }

    public function TotalExpenseRatio(){
        $totalExpense = DB::table('exp_record')->sum('price');
        return $totalExpense;

    }

    public function CategorizedData(){
           $incomeCategory = DB::table('inc_record')->get(['description', 'price']);
    $expenseCategory = DB::table('exp_record')->get(['description', 'price']);
    return view('stats', ['incomeStats' => $incomeCategory, 'expenseStats' => $expenseCategory]);

    }

    // public function CategorizedExpense(){
    //     $Expcategory = DB::table('exp_record')->get(['description', 'price']);
    //     return view('stats',['Expstats'=>$Expcategory]);
    // }


}