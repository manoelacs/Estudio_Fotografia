<?php


namespace App\Http\Requests;
use App\Models\User;
use \Illuminate\Foundation\Http\FormRequest;


class UpdateUserRequest extends FormRequest
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
    public function rules(){
        $rules =[
            'name'  => ['required', 'string'],
            'phone' => ['required', 'string'],

        ];
        if ($this->has('email') && !User::where('email', $this->email)->existis()){
            $updateEmail = [
                'email' => ['required', 'string', 'max:150', 'unique:users']
            ];
            $rules = array_merge($this->rules(), $updateEmail);
        }
        return $rules;
    }

}
