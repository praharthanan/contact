<?php

/**
 * Description of AuthController
 *
 * @author pragan
 */
class AuthController extends Controller {

    /**
     * Login index.
     *
     * @return void
     */
    public function index() {
        return View::make('auth.login');
    }

    /**
     * Attempt to login  to the system.
     *
     * @return void
     */
    public function login() {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($user)) {
            return Redirect::to('admin/contacts')
                            ->with('message_success', 'You are successfully logged in.');
        } else {
            return Redirect::back()->withInput()
                            ->with('message_error', 'Invalid User Name Or Password');
        }
    }

    /**
     * Loging out from the system.
     *
     * @return void
     */
    public function logout() {
        Auth::logout();
        return Redirect::to('/')
                        ->with('message_info', 'You have logged out.');
    }

    /**
     * Index home page for Admin.
     *
     * @return void
     */
    public function home() {
        return Redirect::to('admin/contacts');
    }

}
