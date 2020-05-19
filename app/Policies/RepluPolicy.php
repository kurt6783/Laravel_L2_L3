<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Replu;

class RepluPolicy extends Policy
{
    public function update(User $user, Replu $replu)
    {
        // return $replu->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Replu $replu)
    {
        return true;
    }
}
