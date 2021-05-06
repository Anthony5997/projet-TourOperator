<?php

class Review{

    private int $id;
    private string $message;
    private string $author;
    private $user_grade;
    private int $id_tour_operator;

    /*Methode*/

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
            $this->$method($value);
            }
        }
        }

    public function getId(){
        return $this->id;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getUserGrade(){
        return $this->user_grade;
    }

    public function getId_tour_operator(){
        return $this->id_tour_operator;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function setUser_grade($user_grade){
        $this->user_grade = $user_grade;
    }

    public function setId_tour_operator($id_tour_operator){
        $this->id_tour_operator = $id_tour_operator;
    }
}