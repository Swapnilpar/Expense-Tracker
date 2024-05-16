<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use App\exp_record;

class ExpenseController extends Controller
{
    public function index(){
        return view('expense');
    }

    public function showexpRecord()
    {
        // return DB::table('exp_record')->get();
        $data = DB::table('exp_record')->get();
        return view('expense',['expdata'=>$data]);
    }

    public function delExpRecord($id){
        DB::delete('delete from exp_record where id = ?', [$id]);
        return redirect('expense')->with('success', "Data Successfully Deleted");
    }
        
    public function ExpData(Request $request){
        // $request->validate([
        //     'exp_description'=>'required',
        //     'exp_price'=>'required',
        //     'exp_date'=>'required'
        // ]);
        
        $query = DB::table('exp_record')->insert([
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'date'=>$request->input('date')            
        ]);

        if($query){
            return back()->with('success', 'Expense Added successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
    }
}