<?php

use App\Models\Role;
use App\Models\Usuario;

if(!function_exists('getUserRole')) {
    function getUserRole(Usuario $usuario){
        $role_id = '';
        foreach($usuario->role as $rol) {
            $role_id = $rol->pivot->role_id;
        }
        $role = Role::find($role_id);
        return $role->roles;
    }
}