<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SkillController extends Controller
{
    public function index(){
        return SkillResource::collection(Skill::all());
    }

    public function show(Skill $skill){

        return new SkillResource($skill);
    }

    public function store(StoreSkillRequest $request){
        Skill::create($request->validated());
        return response()->json("Skill Created");
    }

    public function update(StoreSkillRequest $request, Skill $skill){
        $skill->update($request->validated());
        return response()->json("Skill Updated");
    }
    public function destroy(Skill $skill){
        $skill ->delete();
        return response()->json("Skill Deleted");
    }

    // Register ham login

    public function createUser(){
        $user = new User();
        $user->name = "Temurmirzo";
        $user->username = "ta6931";
        $user->email = "TA@abcd.uz";
        $user->password = Hash::make("qwerty");
        $user->save();
        return 555;
    }
    public function userCheck(Request $request){
        $user = User::where('username',$request->input('username'))->first();
        if($user && Hash::check($request->input('password'), $user->password)){
            return $user->createToken('token-name')->plainTextToken;
            return 'Successfully login';
        }
        return 'Not user';
    }
}
