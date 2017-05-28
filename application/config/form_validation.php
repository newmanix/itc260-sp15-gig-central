<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| FORM VALIDATION SETTINGS
| -------------------------------------------------------------------
| 
*/

// Set custom form validation rules here.
$config = array(
        // Sets validation rules for the 'Add a Gig' form
        'gig/add' => array(
            array(
                'field' => 'Name',
                'label' => 'Company Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'CompanyAddress',
                'label' => 'Company Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'CompanyCity',
                'label' => 'Company City',
                'rules' => 'required'
            ),
            array(
                'field' => 'CompanyState',
                'label' => 'Company State',
                'rules' => 'required'
            ),
            array(
                'field' => 'ZipCode',
                'label' => 'Zip Code',
                'rules' => 'required'
            ),
            array(
                'field' => 'FirstName',
                'label' => 'Contact first name',
                'rules' => 'required'
            ),
            array(
                'field' => 'LastName',
                'label' => 'Contact last name',
                'rules' => 'required'
            ),
            array(
                'field' => 'Email',
                'label' => 'Contact email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'GigOutline',
                'label' => 'Gig description',
                'rules' => 'required'
            ),
            array(
                'field' => 'EmploymentType',
                'label' => 'Employment type',
                'rules' => 'required|callback_checkDropdown'
            )
        ),
        'venues/add' => array(
            array(
                'field' => 'VenueName',
                'label' => 'Venue Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'VenueAddress',
                'label' => 'Venue Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'City',
                'label' => 'Venue City',
                'rules' => 'required'
            ),
            array(
                'field' => 'ZipCode',
                'label' => 'Venue Zip Code',
                'rules' => 'required'
            ),
            array(
                'field' => 'VenuePhone',
                'label' => 'Venue Phone',
                'rules' => 'required'
            ),
            array(
                'field' => 'State',
                'label' => 'Venue State',
                'rules' => 'required'
            )
        ),
        'profile/add' => array(
            array(
            'field' => 'i_am_a',
            'label' => 'I am a',
            'rules' => 'required'
            ),
            array(
            'field' => 'first_name',
            'label' => 'First name',
            'rules' => 'required'
            ),
            array(
            'field' => 'last_name',
            'label' => 'Last name',
            'rules' => 'required'
            ),
            array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[Profile.email]',
                array(
                    'is_unique'     => 'This %s already exists.'
                )
            ),
            array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
            ),
            array(
            'field' => 're_password',
            'label' => 'Password confirmation',
            'rules' => 'required|matches[password]'
            ),
            array(
            'field' => 'bio',
            'label' => 'bio',
            'rules' => 'required'
            )
        )
);

// Sets custom delimeters for error messages on forms. 
// These settings MAY not work if they are above custom validation rules.
$config['error_prefix'] = '<div class="text-danger">';
$config['error_suffix'] = '</div>';
