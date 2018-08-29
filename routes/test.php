<?php
$userId = Auth::user()->id;
$userRole = \App\Models\UserRole::with('role.getPermissions.getAllPermissions')->where('user_id', $userId)->first();
dd($userRole);

?>