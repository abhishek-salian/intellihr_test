<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::withTrashed();

        return new UserCollection(
            $users->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        return new UserResource(
            User::create(
                $request->only('name', 'email', 'password')
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource(
            $user
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->save();

        return new UserResource(
            $user
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return new UserResource(
            $user
        );
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(int $id)
    {
        $user = User::withTrashed()->find($id);
        $this->authorize('restore', $user);
        $user->restore();

        return new UserResource(
            $user
        );
    }
}
