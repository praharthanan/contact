<?php

/**
 * Description of ContactController
 *
 * @author pragan
 */
use Repositories\ContactRepository;

class ContactController extends Controller {

    /**
     * The Contact repository implementations.
     *
     * @var ContactRepository
     */
    protected $contact;

    /**
     * Constructor.
     *
     * @param ContactRepository $contact
     */
    public function __construct(ContactRepository $contact) {
        $this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->contact = $contact;
    }

    /**
     * Index page of contact.
     *
     * @return void
     */
    public function index() {
        $contacts = $this->contact->index();

        if (is_null($contacts)) {
            App::abort('404');
        }

        return View::make('home', compact('contacts'));
    }

    /**
     * Store contact.
     *
     * @return void
     */
    public function store() {
        // Inputs
        $name = Input::get('name');
        $phone = Input::get('phone');
        $address = Input::get('address');
        $email = Input::get('email');

        // Validation
        $messages = $this->contact->validateCreate($name, $phone, $address, $email);

        if (count($messages->errors()) > 0) {
            return Redirect::back()->withInput()->withErrors($messages)->with('error_code', 5);
        }

        //Attempt Update
        try {
            $contact = $this->contact->store($name, $phone, $address, $email);

            return Redirect::to('admin/contacts')
                            ->with('message_success', 'Contact ' . $contact->name . ' has been created.');
        } catch (\Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Update contact.
     *
     * @param int $id
     *
     * @return void
     */
    public function update($id = null) {
        // Inputs
        $name = Input::get('edit-name');
        $phone = Input::get('edit-phone');
        $address = Input::get('edit-address');
        $email = Input::get('edit-email');

        // Validation
        $messages = $this->contact->validateUpdate($id, $name, $phone, $address, $email);

        if (count($messages->errors()) > 0) {
            return Redirect::back()->withInput()->withErrors($messages);
        }

        //Attempt Update
        try {
            $contact = $this->contact->update($id, $name, $phone, $address, $email);

            return Redirect::to('admin/contacts')
                            ->with('message_success', 'Contact ' . $contact->name . ' has been updated.');
        } catch (\Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Delete contact.
     *
     * @param int $id
     *
     * @return void
     */
    public function delete($id = null) {
        //Attempt Delete
        try {
            $contact = $this->contact->delete($id);

            return Redirect::to('admin/contacts')
                            ->with('message_success', 'Contact ' . $contact->name . ' has been deleted.');
        } catch (\Exception $e) {
            return Redirect::back()
                            ->withInput()
                            ->with('message_error', $e->getMessage());
        }
    }

    /**
     * Search contacts by name.
     *
     * @return void
     */
    public function searchName() {
        $name = Input::get('search_name');
        $contacts = $this->contact->searchName($name);

        return View::make('home', compact('contacts'));
    }

}
