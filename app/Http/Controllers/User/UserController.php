<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['loginUser']]);
    }

    public function loginUser(Request $request)
    {
        if(!$token = auth()->attempt($request->only('name','password'))) {
            return $this->responseError("Invalid credentials", "");
        }

        $data['username'] = $request->name;
        $data['token'] = $token;

        return $this->responseSuccess("Succesfully Login User", $data);
    }

    public function createUser(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->responseError("Data not valid", $validate->errors()->first());
        }

        $req = $request->all();
        $user = new Users();

        foreach ($req as $key => $values) {
            $user[$key] = $values;

            if ($key == 'password') {
                $user[$key] = bcrypt($req['password']);
            }
        }

        if ($user->save()) {
            $data = Users::where('id', $user['id'])->get();
            return $this->responseSuccess('Success create data', $data);
        } else {
            return $this->responseError('Failed create data', 'Failed create data');
        }
    }

    public function getUser()
    {
        $data = Users::get();

//        $data = \auth()->user();

        if (!$data) {
            return $this->responseError("Failed get data", "Something went wrong");
        }
        return $this->responseSuccess("Succesfully get data", $data);
    }

    public function updateUser(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->responseError("Data not valid", $validate->errors()->first());
        }


        $update = Users::where('id', $id)->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if ($update) {
            $data = Users::where('id', $id)->get();
            return $this->responseSuccess('Success update user', $data);
        } else {
            return $this->responseError('Failed update user', 'Nothing to update');
        }
    }

    public function deleteUser($id)
    {
        $delete = Users::where('id', $id)->delete();
        if ($delete) {
            return $this->responseSuccess("Success delete user", "");
        } else {
            return $this->responseError("Failed delete user", "");
        }
    }
}
