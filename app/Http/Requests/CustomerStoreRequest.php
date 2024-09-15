<?php 
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    
    class CustomerStoreRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool
        {
            // Change this to true if you want to allow this request
            return true;
        }
    
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return [
                'first_name' => 'required|string|max:258',
                'last_name' => 'required|string|max:258',
                'dob' => 'required|date',
                'gender' => 'required|string',
                'tel' => 'required|string',
                'email' => 'required|string|email',
            ];
        }
    
        /**
         * Get the error messages for the defined validation rules.
         *
         * @return array<string, string>
         */
        public function messages(): array
        {
            return [
                'first_name.required' => 'First name is required',
                'last_name.required' => 'Last name is required',
                'dob.required' => 'Dob is required',
                'gender.required' => 'Gender is required',
                'tel.required' => 'Tel is required',
                'email.required' => 'Email is required',
            ];
        }
    }
    
?>