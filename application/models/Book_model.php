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

    public function getBooks($userId)
    {

        //check if userId is null
        if ($userId == null) {
            $data = $books = $this->db->get("books")->result();
        }
        //user id is not null get all user books
        else {
            $data = $this->db->where("userid", $userId)->get("books")->result();
        }

        return array(
            "result" => true,
            "data" => $data,
        );

    }

    public function deleteBookImage($imageName)
    {
        $fileName = "uploads/" . $imageName;
        if (file_exists($fileName)) {
            unlink($fileName);
        }
    }

    public function deleteBook($bookId)
    {
        //delete books
        $this->db->where("id", $bookId)->delete("books");

        $affectedRows = $this->db->affected_rows();

        // if book deleted
        if ($affectedRows > 0) {
            return array(
                "result" => true,
                "message" => "Book Deleted Successfully",
            );
        }

        // if not deleted
        return array(
            "result" => false,
            "message" => "Unsuccessful to delete book",
        );

    }
}
