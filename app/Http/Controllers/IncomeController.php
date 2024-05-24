<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Income;


class IncomeController extends Controller
{


    // display income page
    public function index()
    {
        return view('income');
    }


    // show income records in table 
     public function showincRecord()
    {
        $data = Income::paginate(10);
        return view('income', ['data' => $data]);
    }

    // fetch income data from the form and save in the database
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


    // delete income record
    public function delIncRecord($id)
    {
        $income = Income::destroy($id);
        return redirect('income')->with('success', "Data Successfully Deleted");
    }



    // update income record 
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




 