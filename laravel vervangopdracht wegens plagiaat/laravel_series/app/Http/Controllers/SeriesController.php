<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    //

    public function GetAll()
    {
    	$results = DB::select('select * from series');
    	if ($results) {
    		return view('opdracht.index', ['items' => $results]);
    	}
    }

    public function GetFromID($id, $function)
    {
        $result = DB::select('select * from series where id = (?)', [$id]);
        if ($result) {
            if ($function == 'edit') {
                return view('opdracht.edit', ['item' => $result]);
            } elseif ($function == 'delete') {
                return view('opdracht.delete', ['item' => $result]);
            }
        }
    }

    public function Insert(request $request)
    {
        $title = $request->input('title');

    	$insert = DB::insert('insert into series (title) values (?)', [$title]);

    	if ($insert) {
            return redirect()->route('index');
        }
    }

    public function Update(request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');

    	$update = DB::update('update series set title = (?) where id = (?)', [$title, $id]);

    	if ($update) {
            return redirect()->route('index');
        }
    }

    public function Delete(request $request)
    {
        $id = $request->input('id');

    	$delete = DB::delete('delete from series where id = (?)', [$id]);

    	if ($delete) {
            return redirect()->route('index');
        }
    }
}
