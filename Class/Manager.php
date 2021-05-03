<?php 

class Manager{

    private PDO $pdo;

    /*Methode*/

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllDestinations(){

    }

    public function getOperatorByDestination(){

    }

    public function createReview(){

    }

    public function getReviewByOperator(){

    }

    public function getAllOperators(){

    }

    public function updateOperatorToPremium(){

    }

    public function createTourOperator(array $tourOperator){

        $CharacterStatement = $this->pdo->prepare("INSERT INTO tour_operator (name, pass) VALUE (:name, :pass)");
        $CharacterStatement->bindValue("name", $tourOperator['name'], PDO::PARAM_STR);
        $CharacterStatement->bindValue("pass", $tourOperator['pass'], PDO::PARAM_STR);
        $CharacterStatement->execute();
        $idOperatorCreated = (int)$this->pdo->lastInsertId();
        $aOperator = $this->getOperator($idOperatorCreated);
        $operator= new TourOperator($aOperator);
        $_SESSION = ["id"=>$operator->getId(), "name"=>$operator->getName(), "grade"=>$operator->getGrade(), "premium"=>$operator->getPremium(), "connect"=>1];
        
    }

    public function getOperator($id){
        $CharacterStatement = $this->pdo->query('SELECT id, name, pass, grade, link, is_premium FROM tour_operator WHERE id = '.$id);
        return $CharacterSelected = $CharacterStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function operatorExist($operator){
        $CharacterStatement = $this->pdo->prepare("SELECT COUNT(*) FROM tour_operator WHERE name = ?");
        $CharacterStatement->execute([
            $operator
        ]);
        $result = empty($CharacterStatement->fetchColumn());
        return (bool) $result;
    }

    public function createDestination(){

    }
}