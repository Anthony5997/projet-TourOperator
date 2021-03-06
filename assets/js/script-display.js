$(document).ready(function(){
    $(".hiddenFeature").hide();
    $(".comment-zone").hide();
    $(".hiddenPicture").hide();
    $(".hidden-form-comment").hide();
    $(".form-destination").hide();
    $(".form-operator").hide();
    $(".hiddenReview").hide();
    $(".hiddenLink").hide();
});

$( ".modify" ).click(function() {
let id = this.getAttribute('id');
    $(`#modify${id}`).toggle();
  });


$( ".modify-state" ).click(function() {
let id = this.getAttribute('id');
    $(`#modify-state${id}`).toggle();
  });
  
$( ".modify-picture" ).click(function() {
let id = this.getAttribute('id');
  $(`#modify-picture${id}`).toggle();
});
  
$( ".modify-state-comment" ).click(function() {
let id = this.getAttribute('id');
  $(`#modify-state-comment${id}`).toggle();
});

$( ".hidden-form-destination" ).click(function() {
  let id = this.getAttribute('id');
    $(`#hidden-form-destination${id}`).toggle();
  });

  $( ".hidden-form-operator" ).click(function() {
      $(`#hidden-form-operator`).toggle();
    });

    $( ".modify-review" ).click(function() {
      let id = this.getAttribute('id');
      $(`#modify-review${id}`).toggle();
    });

    $( ".modify-link" ).click(function() {
      let id = this.getAttribute('id');
      $(`#modify-link${id}`).toggle();
    });