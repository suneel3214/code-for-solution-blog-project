<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\File;
use App\Models\Newuser;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    public function userregister()

    {
         $data['states'] = State::get(["name","id"]);
        //  dd($data['states']);
         return view('auth.user_register',$data);
    }

    public function userregistercreate(Request $request )
    {
        $request->validate([
            'email' => 'required|email|unique:newusers',
        ]);
        // dd($request->all());
        $user = new Newuser([
            "name" =>$request->name,
            "email" =>$request->email,
            "mobile" =>$request->mobile,
            "address" =>$request->address,
            "city" =>$request->city,
            "state_id" =>$request->state_id,

        ]);
        $user->save();

        foreach ($request->skill as $key=> $skill) {
            $saveRecord = [
              'skill' => $request->skill[$key],
              'newuser_id' => $user->id,
            ];
            DB::table('skills')->insert($saveRecord);
        }

    if($request->hasFile("images")){
        $files = $request->file("images");
        foreach($files as $file){
            $imageName=time().'-'.$file->getClientOriginalName();
            $request['newuser_id']=$user->id;
            $request['image']=$imageName;
            $file->move(\public_path("/image"),$imageName);
            File::create($request->all());
        }
    }
    return redirect("dashboard")->with('success','New User Registration successfully.');
    //}

    }

    public function editNewUser($id){

        $user = Newuser::with('files','skills')->find($id);
        $states='';
        $data['cities']='';
        $data['states'] = State::get(["name","id"]);

                if(isset($user) && isset($user->state_id) && $user->state_id !='')
                {
                    $data['cities'] = City::select('name','id')->where('state_id',$user->state_id)->get();
                }
        return view('auth.edit',$data,compact('user'));

    }

    public function update(Request $request , $id)
    {

        $newuser = Newuser::findOrFail($id);

        $newuser->update([
            "name" =>$request->name,
            "email" =>$request->email,
            "mobile" =>$request->mobile,
            "address" =>$request->address,
            "city" =>$request->city,
            "state_id" =>$request->state_id,
        ]);
        $newuser->save();
         $skilldata = Skill::where('newuser_id',$newuser->id)->first();
        //  if(isset($skilldata)){
        foreach ($request->skill as $key=> $skill) {
        // foreach($skilldata as $skilldata){
        //  return $skilldata;
            if($skilldata->skill != $request->skill[$key]){
                // return $request->skill[$key];
            $saveRecord = [
              'skill' => isset($request->skill[$key]) ? $request->skill[$key]:'',
              'newuser_id' => $newuser->id,
            ];
            Skill::create($saveRecord);
            }
        }



        if($request->hasFile("images")){
            $files = $request->file("images");
            foreach($files as $file){
                $imageName=time().'-'.$file->getClientOriginalName();
                $request['newuser_id']=$newuser->id;
                $request['image']=$imageName;
                $file->move(\public_path("/image"),$imageName);
                File::create($request->all());
            }
        }
          return redirect("dashboard")->with('success','Updated successfully.');

    }

    public function deleteskill($id){
// return $id;
        DB::table('skills')->where('id',$id)->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }


    // public function deleteimg($id){
    //             DB::table('files')->where('id',$id)->delete();

    //             return response()->json([
    //                 'success' => 'Record deleted successfully!'
    //             ]);
    //         }




    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function adminRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
        $data = Newuser::with('files','skills')->get();
            return view('dashboard')->with(['data' => $data]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function allInformation($id){
        $newuser = Newuser::with('files','skills','states')->find($id);
        // dd($newuser);
        return view('auth.view',compact('newuser'));
    }

    public function destroy($id)
    {
        $del = Newuser::find($id);
        $del->files()->delete();
        $del->skills()->delete();
        $del->delete();

        return redirect()->back()->with('success',' Deleted Successfully');
    }

    public function deleteimg($id){

             $images = File::findOrFail($id);

             $images->delete();

             return back();
    }


}

