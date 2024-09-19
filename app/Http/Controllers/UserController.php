<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $input['roles_name'] = 'owner';

        $user = User::create($input);

        // تعيين دور "owner" للمستخدم الجديد
        $user->assignRole('owner');

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        // التحقق من أن المستخدم مسجل الدخول وأنه يحاول عرض ملفه الشخصي فقط
        if (auth()->user()->id == $user->id) {
            return view('users.profile', compact('user'));
        } else {
            return redirect()->route('users.profile', auth()->user()->id)
                ->with('error', 'Unauthorized to access profiles of others.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'Status' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->Status = $request->Status;

        // إذا كان هناك تغيير في كلمة المرور، يتم تشفيرها
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
