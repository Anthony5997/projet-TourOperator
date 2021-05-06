<?php

class Picture{

    private int $id;
    private string $link;

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

    public function getLink(){
        return $this->link;
    }


    public function setId(int $id){
        $this->id = $id;
    }

    public function setLink(string $link){
        $this->link = $link;
    }


}