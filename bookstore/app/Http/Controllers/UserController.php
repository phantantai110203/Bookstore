<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function countUsers()
    {
        $userCount = User::all()->count();

        return view('admin.dashboard', ['userCount' => $userCount]);
    }
    public function index(){
        $lst=User::paginate();
        return view('admin.users-index', compact('lst'))->with('i',(request()->input('page',1)-1)*50);

    }

    public function show(User $user)
    {
        return view('admin.users-show', ['p' => $user]);
    }
    public function create()
    {

        return view('admin.users-create');
    }
    public function store(StoreUserRequest $request)
    {

        //dd($request->all());
        //
        $p = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->merge(['password' => Hash::make($request->password)]),
            'phone' => $request->phone,
            'role' => '1',
        ]);


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        $user->delete();
        return redirect()->route('users.index');
    }
    //
    public function edit(User $user)
    {
        //
        return view('admin.users-edit', ['p' => $user]);

    }
    //
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        $user->save();
        return redirect()->route('users.index', ['user' => $user]);

    }

    // public function show(User $user)
    // {
    //     //dd($user);
    //     return view('pages.user-show', ['user' => $user]);
    // }
    public function detail(User $user)
    {
        return view('pages.user-show', compact('user'));
    }

}