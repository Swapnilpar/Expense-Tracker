<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class IncomeController extends Controller
{
    public function index(){
        return view('income');
    }

    public function showincRecord(){
                // return DB::table('inc_record')->get();
        $data = DB::table('inc_record')->get();
        return view('income',['data'=>$data]);
    }

    public function delIncRecord($id){
        DB::delete('delete from inc_record where id = ?', [$id]);
        return redirect('income')->with('success', "Data Successfully Deleted");
        
    }
    
    public function IncData(Request $request){
          $query = DB::table('inc_record')->insert([
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'date'=>$request->input('date')            
        ]);

        if($query){
            return back()->with('success', 'Income data added successfully!');
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }
    }
}