<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // ================= ADMIN =================

    // Show insert product page
    public function insert()
    {
        return view('Admin.insertproducts');
    }

    // Insert product
    public function insertProducts(Request $req)
    {
        // Validate input
        $data = $req->validate([
            'Name' => 'required|string|max:255',
            'Price' => 'required|numeric',
            'Quantity' => 'required|integer',
            'Description' => 'required|string',
            'Category' => 'required|string|max:255',
            'Status' => 'required|in:0,1',
            'Image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Upload image
        $file = $req->file('Image')->store("Products", "public");
        $path = basename($file);

        // Create product
        $product = new Product();
        $product->Name = $data['Name'];
        $product->Price = $data['Price'];
        $product->Quantity = $data['Quantity'];
        $product->Description = $data['Description'];
        $product->category = $data['Category']; // DB column should be `category`
        $product->Status = $data['Status'];
        $product->pic = $path;                 // DB column should be `pic`
        $product->show_in_home = $req->has('show_in_home') ? 1 : 0; // ⭐ Home page option

        $product->save();

        return redirect()->route('fatchProducts')
            ->with('success', 'Product inserted successfully.');
    }

    // Fetch all products for admin
    public function fatchProducts()
    {
        $fatch = Product::all();
        return view('Admin.FatchProducts', compact("fatch"));
    }

    // Delete product
    public function deleteProduct($id)
    {
        Product::destroy($id);
        return redirect()->route('fatchProducts')
            ->with('success', 'Product deleted successfully.');
    }

    // ================= USER =================

    // Home page - show latest 6 products with show_in_home = 1
    public function index()
    {
        $products = Product::where('show_in_home', 1)
            ->where('Status', 1)
            ->latest()
            ->take(6)
            ->get();

        return view('index', compact('products'));
    }

    // Shop page with search and optional category filter
    public function shop(Request $request)
    {
        $products = Product::where('Status', 1)
            ->when($request->q, function ($query) use ($request) {
                $query->where('Name', 'like', '%' . $request->q . '%');
            })
            ->when($request->category, function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->paginate(8);

        return view('user.shop', compact('products'));
    }

    // Product detail page
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.details', compact('product'));
    }

    // Category wise products page
    public function categoryProducts($category)
    {
        $products = Product::where('category', $category)->get();
        return view('User.category_products', compact('products', 'category'));
    }

    // Search page
    public function search(Request $request)
    {
        $query = $request->q;

        if (!$query) {
            $products = collect(); // empty collection
        } else {
            $products = Product::where('Name', 'LIKE', "%{$query}%")->get();
        }

        return view('User.search-results', compact('products', 'query'));
    }
}
