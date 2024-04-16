<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\User;
use App\Models\PasswordResetToken;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(){
        $logo       = @Setting::key(Setting::LOGO)->first()->value;       
        $icon       = @Setting::key(Setting::ICON)->first()->value;       
        $setting    = (object) compact('logo','icon');
        return view('admin.auth.login', compact('setting'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $remember = $request->remember;

        $admin = auth()->guard('web')->attempt($credentials, $remember);

        if($admin){
            return redirect()->intended(route('admin.index'));
        }

        return redirect()->back()->withInput($request->only('username','remember'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function showRegistrationForm()
    {
        $roles = Role::get();
        return view('admin.auth.create', compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => [
                'required',
                Rule::unique('users')
            ],
            'email' => [
                'required',
                Rule::unique('users')
            ],
            'password' => [
                'required',
                'confirmed'
            ],
            'role' => [
                'required',
                Rule::notIn(['superadmin'])
            ],
            'image' => ['image']
        ]);

        $user = new User();
        $user->password = Hash::make($request->password);

        if ($request->file('image')) {
            $newImage = $user->uploadImage($request->file('image'), 'ugc/images');
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        
        if (@$newImage) {
            $user->image = @$newImage->lg;
        }
        
        $user->save();

        $user->syncRoles(Role::whereName($request->role)->firstOrFail());

        Auth::guard('web')->login($user);

        return redirect()->intended(route('admin.index'))->with([
            'status' => 'success',
            'message' => 'User has been created and logged in successfully'
        ]);
    }
    
    public function showResetForm()
    {
        return view('admin.auth.reset');
    }
    
    public function reset(Request $request)
{
    $customMessage = [
        'email.required'    => 'Email tidak boleh kosong',
        'email.email'       => 'Email tidak valid',
        'email.exists'      => 'Email tidak terdaftar di database',
        'password.required' => 'Password tidak boleh kosong',
    ];

    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required'
    ], $customMessage);

    // Temukan pengguna berdasarkan alamat email yang diberikan
    $user = User::where('email', $request->email)->first();

    // Periksa apakah pengguna ditemukan
    if (!$user) {
        return redirect()->route('admin.password.email')->with(['status' => 'danger', 'message' => 'Email tidak terdaftar di database']);
    }

    // Update password pengguna dengan password baru
    $user->update([
        'password' => Hash::make($request->password)
    ]);

    // Redirect pengguna ke halaman reset password dengan pesan keberhasilan
    return redirect()->route('admin.auth.login')->with(['status' => 'success', 'message' => 'Password berhasil direset']);
}

}
