<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function welcome(){
        $db1_myusers = DB::table('myusers')->get();
        $db2_names = DB::connection('mysql2')->table('names')->get();
        $salaries = Salary::all();
        return view('welcome',compact('db1_myusers', 'db2_names', 'salaries'));
    }
    public function getFromdb1(){
        return DB::table('myusers')->get();
    }


    public function getFromdb2(){
        return response()->json([
            'message' => 'Data fecthed from connection2 successfully.!.',
            'data' => DB::connection('mysql2')->table('names')->get(),
        ]);
    }
    public function insertIntoDb2(){
        // DB::connection('mysql2')->table('names')->insert([
        //     'name' => 'Kuruvila',
        //     'place' => 'UK',
        //     'created_at' => now(),
        // ]);
        return response()->json([
            'message' => 'Data inserted successfully.!.',
            'data' => DB::connection('mysql2')->table('names')->get(),
        ]);
    }
    public function insertSalary(Request $request){

        $validated = $request->validate([
            'month' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        Salary::create([
            'month' => $validated['month'],
            'salary' => $validated['salary'],
        ]);

        return redirect()->back();
    }
}
