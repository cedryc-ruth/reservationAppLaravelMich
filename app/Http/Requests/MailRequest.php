<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:5|max:255|email',
            'subject' => 'required|min:2|max:50',
            'message' => 'required|max:3000'
        ];
    }

    public function messages()
    {
         return [
            'name.required' => 'Veuillez svp saisir votre nom.',
            'email.required' => 'Veuillez svp saisir votre adresse e-mail.',
            'message.required' => 'Désolé, vous ne pouvez pas envoyer un message vide.',
            'name.min' => 'Votre nom doit faire 2 caractères au minimum.',
            'email.min' => 'Votre email doit faire 5 caractères au minimum.',
            'email.max' => 'Votre email doit faire 255 caractères au maximum.',
            'name.max' => 'Votre nom doit faire 255 caractères au maximum.',
            'message.max' => 'Votre message doit faire 3000 caractères au maximum.',
            'email.email' => 'Veuillez svp saisir une adresse e-mail valide.',
            'subject.required' => 'Veuillez nous préciser la raison de votre message. Exemple: WC, débouchage, etc.',
            'subject.min' => 'Le sujet doit au minimum faire 2 caractères',
            'subject.max' => 'Veuillez svp résumer le sujet de votre message (maximum:50 caractères)'
        ];

    }
}
