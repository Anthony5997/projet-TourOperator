<?php

class Destination{

    private int $id;
    private string $location;
    private int $price;
    private int $id_tour_operator;
    private $photo_link_destination;

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

    public function getPhoto_link_destination(){
        return $this->photo_link_destination;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setLocation(string $location){
        $this->location = $location;
    }

    public function setPrice(int $price){
        $this->price = $price;
    }

    public function setId_tour_operator(int $id_tour_operator){
        $this->id_tour_operator = $id_tour_operator;
    }

    public function setPhoto_link_destination( $photo_link_destination){
        $this->photo_link_destination = $photo_link_destination;
    }
}