<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // ================= ADMIN =================

    // Show Insert Product Form
    public function insert(){
        return view('Admin.insertproducts');
    }

    // Insert Product
    public function insertProducts(Request $req){
        $data = $req->validate([
            'Name' => 'required',
            'Price' => 'required',
            'Quantity' => 'required',
            'Description' => 'required',
            'Category' => 'required',
            'Status' => 'required',
            'Image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Upload image
        $file = $req->file('Image')->store("Products", "public");
        $path = basename($file);

        $product = new Product();
        $product->Name = $data['Name'];
        $product->Price = $data['Price'];
        $product->Description = $data['Description'];
        $product->Quantity = $data['Quantity'];
        $product->Categary = $data['Category'];
        $product->Status = $data['Status'];
        $product->pic = $path;
        $product->save();

        return redirect()->route('fatchProducts')->with('success', 'Product inserted successfully.');
    }

    // Fetch All Products (Admin)
    public function FatchProducts(){
        $fatch = Product::all();
        return view('Admin.FatchProducts', compact("fatch"));
    }

    // Delete Product
    public function deleteProduct($id){
        Product::destroy($id);
        return redirect()->route('fatchProducts')->with('success', 'Product deleted successfully.');
    }

    // ================= HOME / USER =================

    // Home Page: Latest 6 products
    public function index(){
        $products = Product::latest()->take(6)->get();
        return view('index', compact('products'));
    }

    // Product Detail Page
    public function show($id){
        $product = Product::findOrFail($id);
        return view('User.product_detail', compact('product'));
    }

    // Category Products Page
    public function categoryProducts($category){
        $products = Product::where('Categary', $category)->get();
        return view('User.category_products', compact('products', 'category'));
    }

    // ================= SEARCH =================
public function search(Request $request){
    $query = $request->input('q');

    // Search in Name or Category
    $products = Product::where('Name', 'LIKE', "%{$query}%")
        ->orWhere('Categary', 'LIKE', "%{$query}%")
        ->get();

    // Pass always products collection to view
    return view('User.search-results', [
        'products' => $products,
        'query' => $query,
    ]);
}

}
