<div class="container-style">
  <div class="container form-review">
        <div class="modify-state-comment d-flex justify-content-center" id="<?=$operatorOnList['operator']->getId();?>">
            <h3 class="text-center h3-review">Laisser un avis ▼</h3>
        </div>
      <div class="form-review-style hidden-form-comment" id="modify-state-comment<?=$operatorOnList['operator']->getId();?>">          
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="author<?=$operatorOnList['operator']->getId()?>" name="author" placeholder="Auteur">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="message<?=$operatorOnList['operator']->getId()?>" name="message" placeholder="Message">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="grade<?=$operatorOnList['operator']->getId()?>" name="grade" min="1" max="5" placeholder="Note">
                </div>
                <button type="submit" class="btn btn-primary col-sm-12 sign-input-button sendForm" data-id-to = '<?= $operatorOnList['operator']->getId()?>'>Submit</button>
            </form>
        </div>
    </div>
</div>