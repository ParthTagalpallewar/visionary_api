<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth_model extends CI_Model
{

    //user singup
    public function createUserAccount(
        $phone,
        $password,
        $name,
        $email) {

        //if phone number already exits
        if ($this->checkPhoneAlreadyExist($phone)) {
            return array(
                "result" => false,
                "message" => "Phone Number Already Exists",
            );
        }

        // Insert the Data
        $user = $this->insertUserToDatabase($phone, $password, $name, $email);
        return array(
            "result" => true,
            "data" => $user,
        );

    }

    //Takes Data and Insert TO Users Database
    private function insertUserToDatabase(
        $phone,
        $password,
        $name,
        $email) {
        $data = array(
            'phone' => $phone,
            "password" => $password,
            'name' => $name,
            'email' => $email,
        );

        $this->db->insert("users", $data);
        $userCreatedId = $this->db->insert_id();

        $user = $this->db->where("id", $userCreatedId)->get("users")->result()[0];
        return $user;

    }

    //return true if phone number exist in database
    private function checkPhoneAlreadyExist($phone)
    {
        

        //return the row of which have same phone no.
        $phoneCountsInDatabase = $this->db->where("phone", $phone)->get("users")->num_rows();

        if ($phoneCountsInDatabase == 1) {
            return true;
        }

        return false;
    }

    //user login
    public function loginUser(
        $phone,
        $password) 
    {
        $phoneNumberExists = $this->checkPhoneAlreadyExist($phone);

        //phone number exists in database
        if ($phoneNumberExists) {

            $user = $this->getUserByPhone($phone);

            //if user password is correct
            if ($password == $user->password) {
                return array(
                    "result" => true,
                    "data" => $user,
                );
            }
            //user password  is incorrect
            else {
                return array(
                    "result" => false,
                    "message" => "Incorrect Password",
                );

            }
        }
        //Phone number Does not exist in Database
        else {
            return array(
                "result" => false,
                "message" => "Does not found this Number",
            );

        }
    }

    //returns user on basis of phone number
    public function getUserByPhone($phone)
    {
        return $this->db->where("phone", $phone)->get('users')->result()[0];
    }
}
