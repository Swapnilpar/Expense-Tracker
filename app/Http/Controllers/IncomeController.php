<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Income;


class IncomeController extends Controller
{


    public function index()
    {
        return view('income');
    }

     public function showincRecord()
    {
        $data = Income::paginate(10);
        return view('income', ['data' => $data]);
    }

    public function IncData(Request $request)
    {
        $income = new Income();
        $income->description = $request->input('description');
        $income->price = $request->input('price');
        $income->date = $request->input('date');
        $income->save();

        if ($income->id) {
            return back()->with('success', 'Income data added successfully!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
        
    }

    public function delIncRecord($id)
    {
        $income = Income::destroy($id);
        return redirect('income')->with('success', "Data Successfully Deleted");
    }

     public function IncomeUpdate(Request $request, $id) {
        $query = Income::find($id);
        if($query){
            $query->description = $request->input('description');
            $query->price = $request->input('price');
            $query->date = $request->input('date');
            $query->save();
            return Redirect::to('/income')->with('success', 'Income data updated successfully!');
        } else {
            return Redirect::back()->with('error', 'Failed to update income data.');
        }
    }
    
}




 
    // public function index(){
    //     return view('income');
    // }

    // public function showincRecord(){
    //     $data = DB::table('inc_record')->get();
    //     return view('income',['data'=>$data]);
    // }

    // public function delIncRecord($id){
    //     DB::delete('delete from inc_record where id = ?', [$id]);
    //     return redirect('income')->with('success', "Data Successfully Deleted");
        
    // }

    // public function IncomeUpdate(Request $request, $id) {
    //     $query = DB::table('inc_record')
    //         ->where('id', $id)
    //         ->update([
    //             'description' => $request->input('description'),
    //             'price' => $request->input('price'),
    //             'date' => $request->input('date')
    //         ]);

    //     if ($query) {
    //         return Redirect::to('/income')->with('success', 'Income data updated successfully!');
    //     } else {
    //         return Redirect::back()->with('error', 'Failed to update income data.');
    //     }
    // }
    
    // public function IncData(Request $request){
    //       $query = DB::table('inc_record')->insert([
    //         'description'=>$request->input('description'),
    //         'price'=>$request->input('price'),
    //         'date'=>$request->input('date')            
    //     ]);

    //     if($query){
    //         return back()->with('success', 'Income data added successfully!');
    //     }
    //     else{
    //         return back()->with('error', 'Something went wrong!');
    //     }

        
    // }