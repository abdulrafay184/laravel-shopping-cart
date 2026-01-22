<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // ================= ADMIN =================

    // Show insert product page
    public function insert(){
        return view('Admin.insertproducts');
    }

    // Insert product
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

        $file = $req->file('Image')->store("Products", "public");
        $path = basename($file);

        $product = new Product();
        $product->Name = $data['Name'];
        $product->Price = $data['Price'];
        $product->Description = $data['Description'];
        $product->Quantity = $data['Quantity'];
        $product->category = $data['Category']; // Make sure column exists in DB
        $product->Status = $data['Status'];
        $product->pic = $path;
        $product->save();

        return redirect()->route('fatchProducts')
            ->with('success', 'Product inserted successfully.');
    }

    // Fetch all products for admin
    public function FatchProducts(){
        $fatch = Product::all();
        return view('Admin.FatchProducts', compact("fatch"));
    }

    // Delete product
    public function deleteProduct($id){
        Product::destroy($id);
        return redirect()->route('fatchProducts')
            ->with('success', 'Product deleted successfully.');
    }

    // ================= USER =================

    // Home page - show latest 6 products
    public function index(){
        $products = Product::latest()->take(6)->get();
        return view('index', compact('products'));
    }

    // Shop page with search and optional category filter
    public function shop(Request $request)
    {
        $products = Product::when($request->q, function ($query) use ($request) {
                $query->where('Name', 'like', '%' . $request->q . '%');
            })
            ->when($request->category, function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->paginate(8);

        return view('user.shop', compact('products'));
    }

    // Product detail page
    public function show($id){
        $product = Product::findOrFail($id);
        return view('User.product_detail', compact('product'));
    }

    // Category wise products page
    public function categoryProducts($category){
        $products = Product::where('category', $category)->get();
        return view('User.category_products', compact('products', 'category'));
    }

    // Search page
    public function search(Request $request)
    {
        $query = $request->q;

        if (!$query) {
            // If user didn't type anything, return empty collection
            $products = collect(); 
        } else {
            // Only search by Name (no category column in DB)
            $products = Product::where('Name', 'LIKE', "%{$query}%")->get();
        }

        return view('User.search-results', compact('products', 'query'));
    }
}
