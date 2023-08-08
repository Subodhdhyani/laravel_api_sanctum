<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class apicontroller extends Controller
{
    function show(){
        return employee::all();
    }


    function showsingle($id){
        return employee::find($id);
    }



    function send(Request $req){
        $emp = new employee;
        $emp->name =$req->name;
        $emp->age =$req->age;       
        $emp->department = $req->department;
        $emp->job_title =$req->job_title;
        $emp->email =$req->email;
        $emp->contact =$req->contact;
        $emp->salary =$req->salary;
        $emp->address =$req->address;
        $result =$emp->save();
        if($result){
            return["status"=>"Successfully Inserted into a database"];
        }else{
            return["status"=>"Something Wrong"];
        }
    }

    function delete($id){
        $a =employee::find($id);
        $result=$a->delete();
        if($result){
            return["status"=>"Deleted Successfully"];
        }else
        return["status"=>"Something Wrong"];
    }

    function update(Request $req,$id){
        $emp = employee::find($id);
        $emp->name =$req->name;
        $emp->age =$req->age;       
        $emp->department = $req->department;
        $emp->job_title =$req->job_title;
        $emp->email =$req->email;
        $emp->contact =$req->contact;
        $emp->salary =$req->salary;
        $emp->address =$req->address;
        $result =$emp->save();
        if($result){
            return["status"=>"Successfully Updated into a database"];
        }else{
            return["status"=>"Something Wrong while updating"];
        }
        
    }

    function search($id){
       $result =Employee::where('name', 'like', '%'.$id.'%')->get();
       if (count($result) === 0) {
        return response()->json(['message' => 'No results found']);
        }
        return response()->json($result);
}

       
}
