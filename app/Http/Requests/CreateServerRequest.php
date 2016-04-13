<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateServerRequest extends Request
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
    public function rules()
    {
        return [
            'server_name' => 'required|unique:servers,server_name|max:255',
            'server_ip'   => 'required|ip',
            'server_port' => 'required|integer|between:0,65355',
        ];
    }
}
