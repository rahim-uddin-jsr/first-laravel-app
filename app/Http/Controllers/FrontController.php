<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BooksType;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    function home()
    {
        // $users = User::where('created_at', '<=', now())->get();
        $users = User::with('nidcard')->get();
        return view('home', ["page_name" => "Home", "users" => $users]);
    }
    function about()
    {
        return view('about', ['page_name' => 'About']);
    }
    function contactUs()
    {
        return view('contact', ['page_name' => 'Contact']);
    }

    function Services()
    {
        $page_name = 'Services';
        $products = [
            1 => [
                'name' => 'Bag',
                'color' => 'Red',
                'price' => '1200',
                'image' => 'https://example.com/bag.jpg',
            ],
            2 => [
                'name' => 'Sunglasses',
                'color' => 'Black',
                'price' => '550',
                'image' => 'https://example.com/sunglasses.jpg',
            ],
            3 => [
                'name' => 'Body Spray',
                'color' => 'Blue',
                'price' => '850',
                'image' => 'https://example.com/bodyspray.jpg',
            ],
            4 => [
                'name' => 'Laptop',
                'color' => 'Silver',
                'price' => '2000',
                'image' => 'https://example.com/laptop.jpg',
            ],
            5 => [
                'name' => 'Headphones',
                'color' => 'White',
                'price' => '150',
                'image' => 'https://example.com/headphones.jpg',
            ],
            6 => [
                'name' => 'Watch',
                'color' => 'Gold',
                'price' => '1200',
                'image' => 'https://example.com/watch.jpg',
            ],
            7 => [
                'name' => 'Shoes',
                'color' => 'Brown',
                'price' => '800',
                'image' => 'https://example.com/shoes.jpg',
            ],
            8 => [
                'name' => 'Perfume',
                'color' => 'Pink',
                'price' => '750',
                'image' => 'https://example.com/perfume.jpg',
            ],
            9 => [
                'name' => 'Backpack',
                'color' => 'Green',
                'price' => '500',
                'image' => 'https://example.com/backpack.jpg',
            ],
            10 => [
                'name' => 'Mobile Phone',
                'color' => 'Black',
                'price' => '1000',
                'image' => 'https://example.com/mobilephone.jpg',
            ],
        ];
        // return redirect('/');
        return response($products)
            ->header("Content-Type", "application/json")
            ->cookie('name', '', time() - 1);
        // return view('services', compact('page_name', 'products'));
    }
    function home1()
    {
        $users = User::where('created_at', '<=', now())->get();
        // $users = User::with('nidcard')->get();
        return $users;
        return view('home', ["page_name" => "Home"]);
    }
    function books()
    {
        $books = Book::with(['publisher', 'author', 'booktype'])->get();
        return $books;
    }
    function booktypes()
    {
        $bookTypes = BooksType::get();
        return $bookTypes;
    }
    function publishers()
    {
        $publishers = Publisher::get();
        return $publishers;
    }
    function authors()
    {
        $authors = Author::get();
        return $authors;
    }
}
