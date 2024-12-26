<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\validation\validatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends Controller
{
    /**UserController
     * Display a listing of the resource.
     */
    use AuthorizesRequests,DispatchesJobs,validatesRequests;
    public function index()
    {
        $users=User::all();
        return view("users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $this->authorize("manageUser" , User::class);
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
             'email'=> 'required|email',
        ]);
        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' =>$request->email ,
        ]);

       return redirect()->route("users.index")->with('success','user add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    { $this->authorize("manageUser",User::class);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user )
    {$this->authorize("manageUser",User::class);
        $request->validate([
            'name' => 'required|string|max:255',

             'email'=> 'required',
        ]);

        $user->update([
            "name" =>$request->name,
            'password' => Hash::make($request->password),
        "email" => $request->email
    ]);


        return redirect()->route("users.index")->with('success', 'user updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    { $this->authorize("manageUser",User::class);
        $user->delete();
        return redirect()->route("users.index")->with('success','users deleted successfully');
    }
}
