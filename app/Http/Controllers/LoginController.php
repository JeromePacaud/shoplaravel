<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showForm(Request $request): View {
        $routeName = $request->route()->getName();
        $context = [
            'routeName' => $routeName,
        ];

        return view('auth.login', $context);
    }

    public function login(LoginRequest $request): RedirectResponse {
        $credentials = $request->validated();
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin()) {
                return redirect()
                    ->route('admin.dashboard')
                    ->with('success', 'Bienvenue' . auth()->user()->first_name . '!');
            }
            return redirect()
                ->intended(route('home'))
                ->with('success', 'Bienvenue' . auth()->user()->first_name . '!');
        }

        return to_route('login')
            ->withErrors(['Email ou mot de passe incorrect.'])
            ->onlyInput('email');
    }
}
