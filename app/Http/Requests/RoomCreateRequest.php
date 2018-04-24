<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomCreateRequest extends FormRequest
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
            'home_type' => 'required',
            'room_type' => 'required',
            'accommodate' => 'required',
            'bed_room' => 'required',
            'bath_room' => 'required',
            'listing_name' => 'required',
            'summary' => 'required',
            'address' => 'required',
            'price' => 'required',
            'images' => 'required',
        ];
    }
}
