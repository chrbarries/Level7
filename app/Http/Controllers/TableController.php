<?php

namespace App\Http\Controllers;


use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    public function index()
    {
        // retrieve all the records
        if (Auth::check())  //included for login defaults
        {
            $data = Table::Table_data(); //Gets content of table to populate
            return view('table.index', [
                'data' => json_decode($data),
            ]); //returns the object to blade
        }

        return redirect('login')->with('success', 'you are not allowed to access');


    }
}
