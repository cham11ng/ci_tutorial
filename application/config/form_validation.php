<?php
/**
 * Created by PhpStorm.
 * User: cham11ng
 * Date: 9/24/16
 * Time: 12:08 AM
 */
/*
|--------------------------------------------------------------------------
| Error delimiters
|--------------------------------------------------------------------------
|
| For validation error
|
| $config['error_prefix'] = '<div class="alert alert-danger">';
| $config['error_suffix'] = '</div>';
*/

// Setting up rules and error message for form validation
$config = array(
    /*
     * member   : class
     * sign_up  : method
     *
     */
    'member/sign_up' => array(
        array(
            'field'     => 'username',
            'label'     => 'Username',
            'rules'     => 'trim|required|alpha_dash|min_length[6]|max_length[50]|is_unique[users.username]',
            'errors'    => array(
                'required'      => 'You must provide a {field}.',
                'min_length'    => '{field} must contain minimum {param} characters.',
                'max_length'    => '{field} should be of maximum {param} characters.',
                'is_unique'     => 'This {field} already taken. Choose another one.'
            )
        ),
        array(
            'field'     => 'password',
            'label'     => 'Password',
            'rules'     => 'required|min_length[6]',
            'errors'    => array(
                'required'      => 'You must provide a {field}.',
                'min_length'    => '{field} must contain minimum {param} characters.'
            )
        ),
        array(
            'field'     => 'pass_confirm',
            'label'     => 'Password Confirmation',
            'rules'     => 'required|matches[password]',
            'errors'    => array(
                'matches'   => 'Password not matched'
            )
        ),
        array(
            'field'     => 'email',
            'label'     => 'Email',
            'rules'     => 'trim|required|valid_email'
        )
    ),

    'login' => array(
        array(
            'field'     => 'username',
            'label'     => 'Username',
            'rules'     => 'trim|required',
            'errors'    => array(
                'required'      => '{field} field empty'
            )
        )
    ),
    'article' => array(
        array(
            'field'     => 'title',
            'label'     => 'Title',
            'rules'     => 'required|min_length[6]|max_length[30]',
            'errors'    => array(
                'required'      => '{field} must be provided',
                'min_length'    => '{field} must contain at-least {param} characters',
                'max_length'    => '{field} must not contain more than {param} characters'
            )
        ),
        array(
            'field'     => 'text',
            'label'     => 'Article',
            'rules'     => 'required'
        )
    )
);