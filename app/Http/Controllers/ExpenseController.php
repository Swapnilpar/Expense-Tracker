<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Expense;

// use App\exp_record;

class ExpenseController extends Controller
{
    public function index(){
        return view('expense');
    }

    public function showexpRecord()
    {
        $data = Expense::paginate(10);
        return view('expense',['expdata'=>$data]);
    }

    public function ExpData(Request $request){
        // $request->validate([
        //     'exp_description'=>'required',
        //     'exp_price'=>'required',
        //     'exp_date'=>'required'
        // ]);
        $query = new Expense();
            $query->description = $request->input('description');
            $query->price = $request->input('price');
            $query->date = $request->input('date');
            $query->save();
        if($query->id){
            return back()->with('success', 'Expense Added successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
    }

    
    public function delExpRecord($id){
        $delrecord = Expense::destroy($id);
        return back()->with('success', 'Expense Deleted successfully');

    }

   public function ExpenseUpdate(Request $request, $id) {
        $query = Expense::find($id);
        if($query){
            $query->description = $request->input('description');
            $query->price = $request->input('price');
            $query->date = $request->input('date');
            $query->save();
            return Redirect::to('/expense')->with('success', 'Expense data updated successfully!');
        }
        else {
            return Redirect::back()->with('error', 'Failed to update expense data.');
        }
    }
    
        
  
}