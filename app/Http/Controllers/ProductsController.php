<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function insert(){
        return view ('Admin.insertproducts');
    }

    function insertProducts(Request $req){


        $data=$req->validate([
            'Name'=>'required',
            'Price'=>'required',
            'Quantity'=>'required',
            'Description'=>'required',
            'Category'=>'required',
            'Status'=>'required',
            'Image'=>'required|image|mimes:jgp,jpeg,png,gif',
        ]);

        $file=$req->file('Image')->store("Products","public");
        $path=basename($file);


        $Products=new Products();
        $Products->Name=$data['Name'];
        $Products->Price=$data['Price'];
        $Products->Description=$data['Description'];
        $Products->Quantity=$data['Quantity'];
        $Products->Categary=$data['Category'];
        $Products->Status=$data['Status'];
        $Products->pic=$path;
        $Products->save();

        if($Products){
            return redirect()->route('fatchProducts')->with('success','Product is inserted...');
        }
        else{
            return 'Data not inserteddd....';
        }
    }

    function FatchProducts(){

        $fatch=Products::all();

            return view('Admin.FatchProducts',compact("fatch"));
        }

        function deleteProduct($id){
            $result=Products::destroy($id);

            if($result){
                return redirect()->route('fatchProducts')->with('success','Product deleted succesfully...');
            }
            else{
                return redirect()->route('fatchProducts');
            }
        }


}
