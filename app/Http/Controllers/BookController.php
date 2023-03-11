<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        // $books = DB::table('series')
        // ->select('title', 'rating')
        // ->join('reviews', 'series.id', 'reviews.series_id')
        // ->get();

        $books = DB::table('series')
        ->selectRaw('title, AVG(rating) as rating')
        ->join('reviews', 'series.id', 'reviews.series_id')
        ->groupBy('series.id')
        ->orderBy('rating')
        ->get();

        // $books = DB::table('series')
        // ->selectRaw('title, rating')
        // ->leftJoin('reviews', 'series.id', 'reviews.series_id')
        // ->where('rating', '=', null)
        // ->get();

        return view('welcome', compact('books'));
    }

    public function author(){
        $authors = DB::table('reviewers')
        ->selectRaw('first_name, last_name, rating')
        ->join('reviews', 'reviewers.id', 'reviews.reviewer_id')
        ->get();
        return view('reviewer', compact('authors'));
    }

    public function genre(){
        $genres = DB::table('series')
        ->selectRaw('genre, AVG(rating) as avg_rating')
        ->join('reviews', 'series.id', 'reviews.series_id')
        ->groupBy('series.id')
        ->get();
        return view('genre', compact('genres'));
    }

    public function leftJoin(){
        $leftjoins = DB::table('reviewers')
        ->selectRaw(
            'first_name, 
            last_name, 
            COUNT(reviewer_id) as count, 
            ifnull(MIN(rating), 0) as min, 
            ifnull(MAX(rating), 0) as max,
            ROUND(ifnull(AVG(rating), 0), 2) as avg'
        )
        ->leftjoin('reviews', 'reviewers.id', 'reviews.reviewer_id')
        ->groupBy('reviewer_id')
        ->orderBy('avg', 'DESC')
        ->get();

        return view('leftjoin', compact('leftjoins'));
    }

    public function many(){
        $books = DB::table('reviewers')
        ->selectRaw('title, rating, first_name, last_name')
        ->join('reviews', 'reviewers.id', 'reviews.reviewer_id')
        ->join('series', 'series.id', 'reviews.series_id')
        ->get();
        return view('many', compact('books'));
    }
}
