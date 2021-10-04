<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    // Create user account
    public function signUp()
    {

        if (validateHeader($this->input->request_headers())) {

            $response = $this->Auth_model->createUserAccount(

                $this->input->post('phone'),
                $this->input->post('password'),
                $this->input->post('name'),
                $this->input->post('email')

            );
            if ($response['result']) {
                sendSuccess($response['data']);
            } else {
                sendError($response['message']);
            }

        }

    }

    public function login()
    {
        if (validateHeader($this->input->request_headers())) {

            $response = $this->Auth_model->loginUser(

                $this->input->post('phone'),
                $this->input->post('password'),

            );
            if ($response['result']) {
                sendSuccess($response['data']);
            } else {
                sendError($response['message']);
            }

        }
        
    }
}
