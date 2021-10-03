<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Auth_model extends CI_Model
{

    public function createUserAccount(
        $phone,
        $password,
        $name,
        $email)
    {


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
        $email) 
    {
        $data = array(
            'phone' => $phone,
            "password" => $password,
            'name' => $name,
            'email' => $email,
        );
        
        $this->db->insert("users", $data);
        $userCreatedId = $rows = $this->db->insert_id();

        $user = $this->db->where("id", $userCreatedId)->get("users")->result()[0];
        return $user;

    }

    //return true if phone number exist in database
    private function checkPhoneAlreadyExist($phone)
    {
        global $users_db;

        //return the row of which have same phone no.
        $phoneCountsInDatabase = $this->db->where("phone", $phone)->get("users")->num_rows();

        if ($phoneCountsInDatabase == 1) {
            return true;
        }

        return false;
    }

}
