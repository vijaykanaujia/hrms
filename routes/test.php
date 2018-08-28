<?php
   $rol = \App\Models\Role::find(1);
    dd($rol->getPermissions());
?>