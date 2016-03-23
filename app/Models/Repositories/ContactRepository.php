<?php

/**
 * Description of ContactRepository
 *
 * @author pragan
 */

namespace Repositories;

use Contact;
use Validator;

class ContactRepository {

    /**
     * Constructor for Repository.
     *
     * @param Models\Contact $model
     */
    public function __construct(Contact $model) {
        $this->model = $model;
    }

    /**
     * Get all data from contacts table.
     *
     * @return void
     */
    public function all() {
        return $this->model->orderBy('created_at', 'ASC')->get();
    }

    /**
     * Get data by pagination from contacts table.
     *
     * @return void
     */
    public function index($perPage = 5, $columns = array('*')) {
        return $this->model
                        ->orderBy('created_at', 'ASC')
                        ->paginate($perPage, $columns);
    }

    /**
     * Get data by id from contacts table.
     *
     * @param int $id
     *
     * @return void
     */
    public function show($id) {
        return $this->model->find($id);
    }

    /**
     * Find data by id from contacts table.
     *
     * @param int $id
     *
     * @return void
     */
    public function find($id) {
        return $this->model->find($id);
    }

    /**
     * List data by name from contacts table.
     *
     * @return void
     */
    public function options() {
        return $this->model->orderBy('name')->lists('name', 'id');
    }

    /**
     * Delete data by id from contacts table.
     *
     * @param int $id
     *
     * @return void
     */
    public function delete($id = null) {
        $model = $this->model->find($id);
        $model->delete();

        return $model;
    }

    /**
     * Add new contact to contacts table.
     *
     * @param string $name
     * @param int $phone
     * @param string $address
     * @param string $email
     *
     * @return void
     */
    public function store($name, $phone, $address, $email) {
        return $this->model->create(compact('name', 'phone', 'address', 'email'));
    }

    /**
     * Edit a contact from contacts table.
     *
     * @param int $id
     * @param string $name
     * @param int $phone
     * @param string $address
     * @param string $email
     *
     * @return void
     */
    public function update($id, $name, $phone, $address, $email) {
        $model = $this->model->find($id);

        $model->fill(compact('name', 'phone', 'address', 'email'))->save();

        return $model;
    }

    /**
     * Search data by name from contacts table.
     *
     * @param string $name
     *
     * @return void
     */
    public function searchName($name = null, $perPage = 5, $columns = array('*')) {

        return $this->model
                        ->where('name', 'like', '%' . $name . '%')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($perPage, $columns);
    }

    /**
     * Validate a contact on create.
     *
     * @param string $name
     * @param int $phone
     * @param string $address
     * @param string $email
     *
     * @return void
     */
    public function validateCreate($name, $phone, $address, $email) {
        $rules = array(
            'name' => 'required',
            'address' => 'max:500',
            'email' => 'required|email',
            'phone' => 'required|Regex:/^[+]?[0-9]{9,13}$/',
        );

        with($validator = Validator::make(compact('name', 'phone', 'address', 'email'), $rules))->fails();

        return $validator;
    }

    /**
     * Validate a Dealer on update.
     *
     * @param int $id
     * @param string $name
     *
     * @return void
     */
    public function validateUpdate($id, $name, $phone, $address, $email) {
        $rules = array(
            'name' => 'required',
            'address' => 'max:500',
            'email' => 'required|email',
            'phone' => 'required|Regex:/^[+]?[0-9]{9,13}$/',
        );

        with($validator = Validator::make(compact('id', 'name', 'phone', 'address', 'email'), $rules))->fails();

        return $validator;
    }

}
