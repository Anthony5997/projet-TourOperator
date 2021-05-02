<?php

class Destination{

    private int $id;
    private string $location;
    private int $price;
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

    public function getLocation(){
        return $this->location;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getId_tour_operator(){
        return $this->id_tour_operator;
    }
}