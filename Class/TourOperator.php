<?php 

class TourOperator{


    private int $id;
    private string $name;
    private int $grade;
    private string $link;
    private bool $is_premium;

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

    public function getName(){
        return $this->name;
    }

    public function getGrade(){
        return $this->grade;
    }

    public function getLink(){
        return $this->link;
    }

    public function getPremium(){
        return $this->is_premium;
    }
}