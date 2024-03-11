<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;

    // REDIRECT
    public function home () { return redirect()->to('/home'); }

    // AUTH
    public function auth () {
        $auth = Auth::user(); //Auth::user();//User::find(4)

        $auth->is_principal = $auth->DB_ROLE_id == 1 ? true : false;
        $auth->is_administrator = $auth->DB_ROLE_id == 2 ? true : false;
        $auth->is_grade_level_coordinator = $auth->DB_ROLE_id == 3 ? true : false;
        $auth->is_adviser = $auth->DB_ROLE_id == 4 ? true : false;
        $auth->is_teacher = $auth->DB_ROLE_id == 5 ? true : false;

        return $auth;
    }

    // HOME
    public function land () {
        $auth = self::auth();

        //
        if ($auth == null) dd("This user does not exist enymore (auth logout then put login redirection here)");
        // Proceed
        return view('pages.home')
            ->with('auth', $auth);
    }
}

/*
    $user = \User::find(Auth::user()->id);

    Auth::logout();

    if ($user->delete()) {

         return Redirect::route('site-home')->with('global', 'Your account has been deleted!');
    }

*/



/*
// Get the user
$user = Auth::user();

// Log the user out
Auth::logout();

// Delete the user (note that softDeleteUser() should return a boolean for below)
$deleted = $this->userManipulator->softDeleteUser($user);

if ($deleted) {
    // User was deleted successfully, redirect to login
    return redirect(url('login'));
} else {
    // User was NOT deleted successfully, so log them back into your application! Could also use: Auth::loginUsingId($user->id);
    Auth::login($user);

    // Redirect them back with some data letting them know it failed (or handle however you need depending on your setup)
    return back()->with('status', 'Failed to delete your profile');
}
*/
