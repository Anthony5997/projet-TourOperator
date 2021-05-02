<?php

class Review{

    private int $id;
    private string $message;
    private string $author;
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

    public function getId_tour_operator(){
        return $this->id_tour_operator;
    }
}