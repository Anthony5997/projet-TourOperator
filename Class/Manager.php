<?php 

class Manager{

    private PDO $pdo;

    /*Methode*/

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllDestinations(){
        $queryStatement = $this->pdo->prepare("SELECT * FROM destination GROUP BY location");
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
        $allOperatorByDestination = $this->pdo->prepare(
            "SELECT * FROM  tour_operator 
            JOIN destination 
                ON tour_operator.id = destination.id_tour_operator 
            /*JOIN review
                ON tour_operator.id = review.id_tour_operator */
            WHERE location = :location");
   
        $allOperatorByDestination->bindValue(':location', $location ,PDO::PARAM_STR);
        $allOperatorByDestination->execute();
        $operatorList = $allOperatorByDestination->fetchAll(PDO::FETCH_ASSOC);
        $arrayDestination= [];
        foreach($operatorList as $operator){
            $arrayInfo = [
                "operator"=> new TourOperator(['id' => $operator['id_tour_operator'], "name"=>$operator['name'], "grade"=>$operator['grade'],"link"=>$operator['link'], "is_premium"=>$operator['is_premium'], "photo_link"=>$operator['photo_link']]),
                "destination"=> new Destination(['id' => $operator['id'], "location"=>$operator['location'], "price" => $operator['price'], 'id_tour_operator'=> $operator['id_tour_operator']]),
                //"review"=> new Review(['id' => $operator['id'], "location"=>$operator['location'], "price" => $operator['price'], 'id_tour_operator'=> $operator['id_tour_operator']])
            ];
            array_push($arrayDestination,  $arrayInfo);
        }
    return $arrayDestination;
  }


    public function createReview(Review $review){
        $locationStatement = $this->pdo->prepare("INSERT INTO review (message, author, user_grade, id_tour_operator) VALUE (:message, :author, :grade, :id_tour_operator)");
        $locationStatement->bindValue("message", $review->getMessage(), PDO::PARAM_STR);
        $locationStatement->bindValue("author", $review->getAuthor(), PDO::PARAM_STR);
        $locationStatement->bindValue("grade", $review->getUserGrade(), PDO::PARAM_INT);
        $locationStatement->bindValue("id_tour_operator", $review->getId_tour_operator(), PDO::PARAM_INT);
        $locationStatement->execute();

    }

    public function getReviewByOperator(TourOperator $operator){
        $queryStatement = $this->pdo->prepare("SELECT * FROM review WHERE id_tour_operator = :id");
        $queryStatement->bindValue(":id", $operator->getId());
        $queryStatement->execute();
        return $listReview = $queryStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAverageGradeByOperator(TourOperator $operator){
        $queryStatement = $this->pdo->prepare("SELECT AVG (user_grade) AS moyenne FROM review WHERE review.id_tour_operator = :id");
        $queryStatement->bindValue(":id", $operator->getId(), PDO::PARAM_INT);
        $queryStatement->execute();
        // var_dump("AVERAGE IN METHOD", $queryStatement->fetch());
        $moyenne = $queryStatement->fetch(PDO::FETCH_ASSOC);
        $operator->hydrate(['grade'=>$moyenne['moyenne']]);
        $this->updateTO($operator);
    }

    public function getAllOperators(){
        $queryStatement = $this->pdo->prepare("SELECT * FROM tour_operator");
        $queryStatement->execute();
        return $listDestination = $queryStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function updateTO(TourOperator $operator){
        $CharacterStatement = $this->pdo->prepare('UPDATE tour_operator SET grade= :grade, link=:link, is_premium = :is_premium, photo_link = :photo_link WHERE id=:id');
        $CharacterStatement->bindValue("grade", $operator->getGrade());
        $CharacterStatement->bindValue("is_premium", $operator->getPremium(), PDO::PARAM_BOOL);
        $CharacterStatement->bindValue("link", $operator->getLink(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("photo_link", $operator->getPhoto_link(), PDO::PARAM_STR);
        $CharacterStatement->bindValue("id", $operator->getId(), PDO::PARAM_INT);
        $CharacterStatement->execute();
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
    }

    public function getOperatorById($param){
         if (is_int($param)) {
                $CharacterStatement = $this->pdo->prepare('SELECT * FROM tour_operator WHERE id = :id');
                $CharacterStatement->bindValue(':id', $param, PDO::PARAM_INT);  
                $CharacterStatement->execute();
                return $CharacterStatement->fetch(PDO::FETCH_ASSOC);
            }
        }

        public function getReviewById($param){
            if (is_int($param)) {
                   $CharacterStatement = $this->pdo->prepare('SELECT * FROM review WHERE id = :id');
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

    public function createDestination(Destination $destination){
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

    public function deleteOperator(TourOperator $operator){
        $locationStatement = $this->pdo->prepare("DELETE FROM tour_operator WHERE id= :id");
        $locationStatement->bindValue(":id", $operator->getId(), PDO::PARAM_INT);
        $locationStatement->execute();
    }

    public function addPicture(Picture $picture){
        $addImg = $this->pdo->prepare("INSERT INTO tour_operator(photo_link) VALUE (:photo_link)");
        $addImg->bindValue(":photo_link", $picture->getLink());
        $addImg->execute();
    }

    public function deleteReview(Review $review){
        $locationStatement = $this->pdo->prepare("DELETE FROM review WHERE id= :id");
        $locationStatement->bindValue(":id", $review->getId(), PDO::PARAM_INT);
        $locationStatement->execute();
    }

    public function searchDestination(string $data){
        $dataStatement = $this->pdo->prepare("SELECT location FROM destination WHERE location LIKE CONCAT('%',:location,'%');:location");
        $dataStatement->bindValue(":location", $data);
        $result = $dataStatement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}