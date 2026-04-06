<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/showcases', function () {
    return view('showcases');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/formtest', function(){
    $emails = session()->get('emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){

    request()->validate([
        'email' => 'required|email'
    ]);

    $emails = session()->get('emails', []);

    if(count($emails) >= 5){
        return back()->with('warning','You have reach the maxium of number 5 emails');
    }

    if(in_array(request('email'), $emails)){
        return back()->with('error','That email has already been added.');
    }

    session()->push('emails', request('email'));

    return back()->with('success', 'Email added successfully!');
});

Route::post('/delete-email', function(){
    $emails = session()->get('emails', []);
    $emailToDelete = request('email');

    $emails = array_filter($emails, fn($e) => $e !== $emailToDelete);
    session()->put('emails', array_values($emails));

    return redirect('/formtest')->with('success',$emailToDelete . ' Has been deleted!');
});

Route::get('/delete-AllEmails', function(){
    session()->forget('emails');

    return redirect('/formtest')->with('success', 'All emails have been deleted successfully!');
});

Route::get('/delete-emails', function(){
    session()->forget('emails');
    return redirect('/formtest');
});