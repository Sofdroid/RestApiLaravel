<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [ 
            'username' => 'required|unique:login,username',
            'password' => 'required'
        ];
            
    }
    
    /**
     * 
     * @param array $errors
     */
    public function response(array $errors) {
        return response()->json([
                'STATUS'=> false,
                'MESSAGE'=>'ERROR',
                'CODE' => 400,
                'ERROR' => $errors
        ], 200);
    }
}
