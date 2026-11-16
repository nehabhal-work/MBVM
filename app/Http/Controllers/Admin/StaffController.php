<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

/** Super-admin only: create ERP logins (each staff member gets their own ID) and manage roles. */
class StaffController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:150'],
            'email'    => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
            'role'     => ['required', Rule::in(array_keys(User::ROLES))],
        ], [
            'email.unique' => 'हा ई-मेल आधीच नोंदलेला आहे.',
        ]);

        $user = User::create($validated + ['email_verified_at' => now()]);

        return $this->back($user->name . ' — लॉगिन तयार केले (' . User::ROLES[$user->role] . ').');
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', Rule::in(array_keys(User::ROLES))],
        ]);

        if ($user->is($request->user()) && $validated['role'] !== 'superadmin') {
            return $this->back('स्वतःची सुपर अ‍ॅडमिन भूमिका काढता येणार नाही.', 'error');
        }

        $user->update($validated);

        return $this->back($user->name . ' — भूमिका: ' . User::ROLES[$user->role]);
    }

    public function resetPassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => ['required', Password::min(8)],
        ]);

        $user->update($validated);

        return $this->back($user->name . ' — नवीन पासवर्ड सेट केला.');
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->is($request->user())) {
            return $this->back('स्वतःचे खाते हटवता येणार नाही.', 'error');
        }

        $user->delete();

        return $this->back($user->name . ' — लॉगिन हटवले.');
    }

    private function back(string $message, string $key = 'success')
    {
        return redirect()->route('admin.users.index', ['tab' => 'settings'])->with($key, $message);
    }
}
