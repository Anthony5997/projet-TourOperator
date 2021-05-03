<?php 

class TourOperator{


    private int $id;
    private string $name;
    private string $pass;
    private int $grade;
    private $link;
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

    /* GETTER */
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPass(){
        return $this->pass;
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

    /*SETTER*/ 

    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setPass(string $pass){
        $this->pass = $pass;
    }

    public function setGrade(int $grade){
        $this->grade = $grade;
    }

    public function setLink($link){
        $this->link = $link;
    }

    public function setIs_premium(bool $is_premium){
        $this->is_premium = $is_premium;
    }

}
