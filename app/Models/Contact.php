<?php

/**
 * Description of Contact
 *
 * @author pragan
 */
class Contact extends Eloquent {

    /**
     * Turn on timestamps
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Set if the table supports soft delete
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('name', 'phone', 'address', 'email');

}
