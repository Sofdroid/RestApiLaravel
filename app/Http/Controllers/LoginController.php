<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    private $l;

    function __construct(Login $l){
        $this->l=$l;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function all() {
        
        $logins = $this->l->all();
        if(count($logins)===0){
            return response()->json(['STATUS'=> false,
                                    'MESSAGE'=>'Record Empty',
                                    'CODE'=>400]
                                    ,200);
        }
        if(!$logins){
            return response()->json(['STATUS'=> false ,
                                    'MESSAGE' => 'Not Found', 
                                    'CODE'=> 400]
                                    ,200);
        }
        else{
            return response()->json([
                    'STATUS'=>'true',
                    'MESSAGE'=>'record found',
                    'DATA' => $logins]
                    , 200);
        }
    }
    public function login($username, $password){
        $logins = $this->l->where('username', $username)->where('password',$password)->first();
        if (!$logins){
           return response()->json([
                    'STATUS'=> false,
                    'MESSAGE'=>'Username or Password Unauthenticate',
                    'DATA' => null
            ], 200);
        } 
        else {
            return response()->json([
                   'STATUS'=> true,
                    'MESSAGE'=>'success',
                    'DATA' => $logins
            ], 200);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
       // $staffs = $request->all();
        
        $staffs = array (
                [ 
                    'username' => $request->get('username'),
                    'password' => sha1(md5($request->get('password'))),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ] 
        );
        $insert = $this->l->insert($staffs);
        if($insert) {
                return response()->json([
                        'STATUS'=> true,
                        'MESSAGE'=>'Login was inserted',
                        'CODE' => 200
                ], 200);
        }
        else{
            return response()->json(['STATUS'=> false ,
                                    'MESSAGE' => 'Login Uncomplete', 
                                    'CODE'=> 400
                                    ], 
                                    200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
