<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DateTimeZone;
use DateTime;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Http\Controllers\EmailController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        if ($user) {
            // $this->emailController->index($user->id);
            Mail::to($user->email)->send(new SendEmail($user->id));
            // Mail::to($user->email)->send(new EmailVerification($user));
            return response()->json(['message' => 'Registration successful'], 201);
        } else {
            return response()->json(['message' => 'Registration failed'], 500);
        }
    }



    // fixed
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', request('email'))->first();

        // Menambahkan keterangan khusus langsung ke token yang dihasilkan
        $customClaims = [
            'id' => $user->id,
            'name' => $user->name,
            'level' => $user->level,
        ];

        $tokenWithClaims = JWTAuth::claims($customClaims)->fromUser($user);

        return $this->respondWithToken($tokenWithClaims, $user);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'access_token' => $token,
            'sub' => $user->id,
            'name' => $user->name,
            'alamat_pegawai' => $user->alamat_pegawai,
            'tanggal_lahir' => $user->tanggal_lahir,
            'tanggal_bergabung' => $user->tanggal_bergabung,
            'jabatan' => $user->jabatan,
            'level' => $user->level,
            'iat' => now()->timestamp,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function deleteUser($id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'success',
            ]);
        }
        return response()->json([
            'message' => 'data not found'
        ]);
    }
}
