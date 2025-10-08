<?php

require 'vendor/autoload.php';

use Illuminate\Support\Facades\Hash;

$app = require_once 'bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$userGroup = \FireflyIII\Models\UserGroup::firstOrCreate(['title' => 'Admin Group']);

$user = \FireflyIII\User::where('email', 'admin@example.com')->first();

if (!$user) {
    $user = new FireflyIII\User();
    $user->email = 'admin@example.com';
    $user->password = Hash::make('1234');
}

$user->user_group_id = $userGroup->id;

$user->save();

echo "User updated with user group.\n";