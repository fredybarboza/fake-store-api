<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Http\Resources\StoreUserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Requests\Api\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return response()->json( new UserCollection($users), 200);
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->avatar = $request->avatar;

        $user->save();

        return response()->json( new StoreUserResource($user), 200);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        if (!is_numeric($id)) { return response()->json(['message' => 'The id must be numeric'], 400); }

        $user = User::find($id);

        if(!$user){ return response()->json(['message' => 'User not found'], 404); }
        
        if($request->has('name')){ $user->name =  $request->name; }
        if($request->has('email')){ $user->email =  $request->email; }
        if($request->has('password')){ $user->password =  $request->password; }
        if($request->has('avatar')){ $user->avatar =  $request->avatar; }

        $user->save();

        return response()->json( new UserResource($user), 200);
    }

    public function show(string $id)
    {
        if (!is_numeric($id)) { return response()->json(['message' => 'The id must be numeric'], 400); }

        $user = User::find($id);

        if(!$user){ return response()->json(['message' => 'User not found'], 404); }

        return response()->json( new UserResource($user), 200);
    }

    public function destroy(string $id)
    {
        if (!is_numeric($id)) { return response()->json(['message' => 'The id must be numeric'], 400); }

        $userExists = User::where('id', $id)->exists();
        if (!$userExists) { return response()->json(['message' => 'User not found'], 404); }

        User::destroy($id);
        
        return response()->json([
            'message' => 'User deleted',
            'user_id' => $id
        ], 200);

    }
}
