<div class="container-style">
  <div class="container form-review">
        <div class="modify-state-comment d-flex justify-content-center" id="<?=$operatorOnList['operator']->getId();?>">
            <h3 class="text-center h3-review">Laisser un avis ▼</h3>
        </div>
      <div class="form-review-style hidden-form-comment" id="modify-state-comment<?=$operatorOnList['operator']->getId();?>">          
            <form method="post" action="process/form-add-review.php?destination=<?=$location;?>">
            <div class="form-group">
                <input type="text" class="form-control" name="author" id="author" placeholder="Auteur">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="message" id="message" placeholder="Message">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="grade" id="grade" min="1" max="5" placeholder="Note">
            </div>
            <input type="hidden" name="id_tour_operator" id="<?= $operatorOnList['operator']->getId()?>" value="<?= $operatorOnList['operator']->getId()?>">
            <button type="submit" class="btn btn-primary col-sm-12 sign-input-button sendForm">Submit</button>
            </form>
      </div>
    </div>
</div>