<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'pro_name' => 'required|min:1|regex:/^[a-zA-Z+\s]+$/'
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
