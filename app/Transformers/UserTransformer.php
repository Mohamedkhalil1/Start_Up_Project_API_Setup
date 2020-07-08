<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        $url = "";
        return [
            'id' => (int) $user->id,
            'name' => (string) $user->name,
            'isAdmin' => (int) $user->is_admin,
            'email' => (string) $user->email,
            'avatar' => (string)$user->avatar !== '' ? $url.$user->avatar : '',
            'creation_date' => (string) $user->created_at->format('d-m-Y')
        ];
    }
}
