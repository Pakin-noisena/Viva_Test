<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\User;

Route::group(['middleware'=>'web'], function(){


//CREATE USER
Route::get('/create/user', function(){
 $user = User::create(['name'=>'Pakin', 'email'=>'Pakin@gmail.com', 'password'=>'Pakin']);      
});
        


//CREATE BOOK ON USER
Route::get('/create/book', function(){
$user = User::findOrFail(1);
$book = new Book(['title' => 'Laravel']);
$user->books()->save($book);
});


//READ BOOK ON USER
Route::get('/read/book', function(){
$user = User::findOrFail(1);
foreach($user->books as $book){
echo $book->title . "<br>";
}});



//UPDATE BOOK ON USER
Route::get('/update/book', function(){
$user = User::findOrFail(1);
$user->books()->where('id', '1')->update(['title'=>'PHP']);

});



//DELETE BOOK ON USER
Route::get('/delete/book', function(){
$user = User::findOrFail(1);
$user->books()->where('id', '1')->delete();
        
});

});