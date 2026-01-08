<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function insert(){
        return view ('Admin.insertproducts');
    }

    // function insertProduts(Request $req){


    //     $data=$req->validate([
    //         'Name'=>'required',
    //         'Price'=>'required',
    //         'Quantity'=>'required',
    //         'Description'=>'required',
    //         'Category'=>'required',
    //         'Image'=>'required|image|mimes:jgp,jpeg,png,gif',
    //     ]);

    //     $file=$req->file('Image')->store("Course","public");
    //     $path=basename($file);


    //     $course=new Course();
    //     $course->Name=$data['Name'];
    //     $course->Amount=$data['Amount'];
    //     $course->Description=$data['Description'];
    //     $course->Picture=$path;
    //     $course->save();

    //     if($course){
    //         return redirect()->route('fatchcourse')->with('success','Course is inserted...');
    //     }
    //     else{
    //         return 'Data not inserteddd....';
    //     }
    // }

}
