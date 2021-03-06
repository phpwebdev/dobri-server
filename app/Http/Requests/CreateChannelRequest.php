<?php

namespace app\Http\Requests;

use App\Http\Requests\Request;

class CreateChannelRequest extends Request
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
            'channel_name' => 'required|unique:channels,channel_name|max:255',
            'server_id'    => 'required',
            'source'       => 'required',
            'rtmp_name'    => 'required',
            'audio_output' => 'required|numeric',
        ];
    }
}
