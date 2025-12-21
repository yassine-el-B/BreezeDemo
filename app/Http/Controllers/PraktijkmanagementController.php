<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PraktijkmanagementController extends Controller
{
    
    private $userModel;


    public function __construct()
    {
        $this->userModel = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //view
        return view('praktijkmanagement.index', [
            'title' => 'Praktijkmanagement Home'
        ]);
    }
public function userroles()
{
    return view('praktijkmanagement.userroles', [
        'title' => 'Gebruikersrollen',
        'users' => User::all(),
    ]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    $user = User::findOrFail($id); // Haal de user op
    return view('praktijkmanagement.show', [
        'title' => 'Gebruiker Details',
        'user' => $user
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
{
    $user = User::findOrFail($id); // Haal de user op
    return view('praktijkmanagement.edit', [
        'title' => 'Gebruiker Wijzigen',
        'user' => $user
    ]);
}
    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'rolename' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->update($request->only(['name','email','rolename']));

    return redirect()->route('praktijkmanagement.userroles')
                     ->with('success', 'Gebruiker succesvol bijgewerkt.');


    return redirect()->route('praktijkmanagement.userroles')
                     ->with('success', 'Gebruiker succesvol bijgewerkt.');
}
    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('praktijkmanagement.userroles')
                     ->with('success', 'Gebruiker succesvol verwijderd.');
}
    public function manageUserroles()
    {
        $users = $this->userModel->sp_GetAllUsers(auth()->user()->id);
        return view('praktijkmanagement.userroles', [
            'title' => 'Gebruikersrollen',
            'users' => $users
        ]);
    }
}
