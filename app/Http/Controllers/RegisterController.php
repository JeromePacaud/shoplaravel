<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showForm(Request $request): View {
        $routeName = $request->route()->getName();
        $context = [
            'routeName' => $routeName,
        ];
        return view('auth.register', $context);
    }

    public function register(RegisterRequest $request): RedirectResponse {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $newUser = User::create($validated);

        Auth::login($newUser);

        return redirect()
            ->route('home')
            ->with('succcess', 'Bienvenue' . auth()->user()->first_name . '!');
    }
}
