<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
  public function create()
  
  {
    return view('register');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:registrations',
      'phone' => 'nullable|string|max:15',
    ]);

    // Store the registration data in the database
    DB::table('registrations')->insert([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Registration successful!');
  }
}
