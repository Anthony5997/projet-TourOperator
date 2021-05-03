<?php 

class Manager{

    private PDO $pdo;

    /*Methode*/

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllDestinations(){
        $queryStatement = $this->pdo->prepare("SELECT * FROM destination");
        $queryStatement->execute();
        return $listDestination = $queryStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSimilarDestination(string $location){
        $queryStatement = $this->pdo->prepare("SELECT * FROM destination WHERE location= :location");
        $queryStatement->bindValue(':location', $location ,PDO::PARAM_STR);
        $queryStatement->execute();
        return $listDestination = $queryStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getDestinationByOperator(TourOperator $operator){
        $queryStatement = $this->pdo->prepare("SELECT * FROM destination WHERE id_tour_operator = :id");
        $queryStatement->bindValue(":id", $operator->getId());
        $queryStatement->execute();
        return $listDestination = $queryStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOperatorByDestination(string $location){
        $allOperatorByDestination = $this->pdo->prepare("SELECT * FROM  tour_operator 
    JOIN destination ON tour_operator.id = destination.id_tour_operator WHERE location = :location");
    $allOperatorByDestination->bindValue(':location', $location ,PDO::PARAM_STR);
    $allOperatorByDestination->execute();
    $operatorList = $allOperatorByDestination->fetchAll(PDO::FETCH_ASSOC);
    $arrayDestination= [];
    foreach($operatorList as $operator){
        array_push($arrayDestination, new TourOperator($operator)); 
    }
    
        // while ($donneesOperatorByDestination = $allOperatorByDestination->fetch(PDO::FETCH_ASSOC))
    // {
    //   array_push($operatorsByDestination, new TourOperator($donneesOperatorByDestination)); 

    // }

    return $arrayDestination;
  }


    public function createReview(){

    }

    public function getReviewByOperator(){

    }

    public function getAllOperators(){
        $queryStatement = $this->pdo->prepare("SELECT * FROM tour_operator");
        $queryStatement->execute();
        return $listDestination = $queryStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function becomePremium(TourOperator $tourOperator){
        $CharacterStatement = $this->pdo->prepare('UPDATE tour_operator SET is_premium = :true WHERE id=:id');
        $CharacterStatement->bindValue("true", true, PDO::PARAM_BOOL);
        $CharacterStatement->bindValue("id", $tourOperator->getId(), PDO::PARAM_INT);
        $CharacterStatement->execute();
    }

    public function createTourOperator(TourOperator $tourOperator){

        $CharacterStatement = $this->pdo->prepare("INSERT INTO tour_operator (name, pass) VALUE (:name, :pass)");
        $CharacterStatement->bindValue("name", $tourOperator->getName(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("pass", $tourOperator->getPass(), PDO::PARAM_STR);
        $CharacterStatement->execute();

        $idOperatorCreated = (int)$this->pdo->lastInsertId();
        $tourOperator->hydrate([
            'id'=> $idOperatorCreated,
            'grade'=>0,
            'is_premium'=>false
        ]);
        // $_SESSION["id"] = $tourOperator->getId();
        // $_SESSION["name"] = $tourOperator->getName();
        // $_SESSION["grade"] = $tourOperator->getGrade();
        // $_SESSION["premium"] = $tourOperator->getPremium();
        // $_SESSION["connect"] = 1;

    }

    public function getOperatorById($param){
         if (is_int($param)) {
                $CharacterStatement = $this->pdo->prepare('SELECT * FROM tour_operator WHERE id = :id');
                $CharacterStatement->bindValue(':id', $param, PDO::PARAM_INT);  
                $CharacterStatement->execute();
                return $CharacterStatement->fetch(PDO::FETCH_ASSOC);
            }
        }

    public function getOperator(TourOperator $operator){
               
            $result = $this->pdo->prepare('SELECT id, name, pass, grade, link, is_premium FROM tour_operator WHERE name= :name');
            $result->bindValue(':name', $operator->getName(), PDO::PARAM_STR);  
            $result->execute();
    
            $arrayOperator = $result->fetch(PDO::FETCH_ASSOC);
            $operator->hydrate($arrayOperator);
        }

    public function operatorExist($operator){
        $CharacterStatement = $this->pdo->prepare("SELECT COUNT(*) FROM tour_operator WHERE name = ?");
        $CharacterStatement->execute([
            $operator->getName()
        ]);
        $result = empty($CharacterStatement->fetchColumn());
        return (bool) $result;
    }

    public function createDestination($destination){
        $locationStatement = $this->pdo->prepare("INSERT INTO destination (location, price, id_tour_operator) VALUE (:location, :price, :id_tour_operator)");
        $locationStatement->bindValue("location", $destination->getLocation(), PDO::PARAM_STR);
        $locationStatement->bindValue("price", $destination->getPrice(), PDO::PARAM_INT);
        $locationStatement->bindValue("id_tour_operator", $destination->getId_tour_operator(), PDO::PARAM_INT);
        $locationStatement->execute();
/*
        $idOperatorCreated = (int)$this->pdo->lastInsertId();
        $destination->hydrate(['id'=> $idOperatorCreated]);
*/
    }
}