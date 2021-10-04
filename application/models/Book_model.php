<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Book_model extends CI_Model
{

    public function addBook($bookData)
    {
        $this->db->insert("books", $bookData);
        $insertedBookId = $this->db->insert_id();


        if ($insertedBookId > 0) {
            
            $book = $this->db->where('id', $insertedBookId)->get("books")->result()[0];

            return array(
                "result" => true,
                "data" => $book,
            );
        }

        //user password  is incorrect
        else {
            return array(
                "result" => false,
                "message" => "Book Can't be Added",
            );

        }

    }

}
