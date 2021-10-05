<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $config = array(
            'upload_path' => "uploads", //path for upload
            'allowed_types' => "jpg|png|jpeg", //restrict extension
            'max_size' => '300000',
            'max_width' => '30000',
            'max_height' => '30000',
        );

        $this->upload->initialize($config);

    }

    public function addBook()
    {
        if (validateHeader($this->input->request_headers())) {

            //uploading image
            $isFileUploaded = $this->upload->do_upload("bookImage");

            //if file not uploaded
            if ($isFileUploaded == false) {
                sendError($this->upload->display_errors());
            }

            //if file uploaded successfully
            else {

                $bookData = array(
                    "bookName" => $this->input->post("book_name"),
                    "bookDesc" => $this->input->post("book_desc"),
                    "bookImage" => $this->upload->data()['file_name'],
                    "bookSelling" => $this->input->post("book_selling"),
                    "bookOriginal" => $this->input->post("book_orig"),
                    "bookCatagory" => $this->input->post("book_category"),
                    "userId" => $this->input->post("user_id"),
                    "userPhone" => $this->input->post("phone"),
                    "city" => $this->input->post("city"),
                    "location" => $this->input->post("location"),
                    "address" => $this->input->post("address"),
                    "district" => $this->input->post("district"),
                );

                //save data to database
                $response = $this->Book_model->addBook($bookData);

                if ($response['result']) {
                    sendSuccess($response['data']);
                } else {
                    sendError($response['message']);
                }

            }

        }

    }

    public function getBooks()
    {
        if (validateHeader($this->input->request_headers())) {

            $userId = $this->input->get('user_id');

            $response = $this->Book_model->getBooks($userId);

            if ($response['result']) {
                sendSuccess($response['data']);
            } else {
                sendError($response['message']);
            }

        }
    }

    public function deleteBook()
    {
        if (validateHeader($this->input->request_headers())) {

            $bookId = $this->input->get("book_id");
            // if book id is not exist in database
            if ($this->db->where("id", $bookId)->get("books")->num_rows() == 0) {
                sendError("Book Not Found");
            } 
            
            // book id exists
            else {
                //get image name of that book
                $imageName = $this->db->where("id", $bookId)->get("books")->result()[0]->bookImage;
                // delete that image from file
                $this->Book_model->deleteBookImage($imageName);

                // delete book from database
                $response = $this->Book_model->deleteBook($bookId);

                if ($response['result']) {
                    sendSuccessResult($response['message']);
                } else {
                    sendError($response['message']);
                }

            }

        }

    }
}
