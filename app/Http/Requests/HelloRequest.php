<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if($this->path() == "hello/index5")
    {
      return true;
    }else{
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      "name" => "required",
      "mail" => "email",
      "age"  => "numeric|hello",
    ];
  }

  public function messages()
  {
      return[
        "name.required" => "カスタムエラー：name",
        "mail.email"    => "カスタムエラー：mail",
        "age.numeric"   => "カスタムエラー：age1",
        "age.hello"     => "カスタムエラー：偶数のみ受け付けます。",
      ];
  }
}
