<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\StoreUserRequest;
use App\Http\Requests\Api\v1\UpdateUserRequest;
use App\Http\Resources\v1\StoreUserResource;
use App\Http\Resources\v1\UserCollection;
use App\Http\Resources\v1\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a paginated listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return response()->json(new UserCollection($users), 200);
    }

    /**
     * Store a new resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return response()->json(new StoreUserResource($user), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        if (! is_numeric($id)) {
            return response()->json(['message' => 'The id must be numeric'], 400);
        }

        $user = User::find($id);

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
            $user->password = $request->password;
        }

        $user->save();

        return response()->json(new UserResource($user), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (! is_numeric($id)) {
            return response()->json(['message' => 'The id must be numeric'], 400);
        }

        $user = User::find($id);

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(new UserResource($user), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! is_numeric($id)) {
            return response()->json(['message' => 'The id must be numeric'], 400);
        }

        $userExists = User::where('id', $id)->exists();
        if (! $userExists) {
            return response()->json(['message' => 'User not found'], 404);
        }

        User::destroy($id);

        return response()->json([
            'message' => 'User deleted',
            'user_id' => $id,
        ], 200);

    }
}
