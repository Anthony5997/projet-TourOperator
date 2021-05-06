let btns = document.querySelectorAll('.sendForm')


btns.forEach((btn)=>{

    btn.addEventListener('click',(e)=>{
        e.preventDefault()
        let idTo = e.target.getAttribute('data-id-to')
        sendReview(idTo)
    })
})

function sendReview(idTo){
    let author =  document.getElementById("author"+idTo);
//    let id_tour_operator = document.getElementById("id_tour_operator"+idTo);
   let message = document.getElementById("message"+idTo);
   let grade_review = document.getElementById("grade"+idTo);

    formData = new FormData()
    formData.append('author', author.value)
    formData.append('id_tour_operator', idTo)
    formData.append('message', message.value)
    formData.append('grade', grade_review.value)

    fetch('/project-tourOperator/process/form-add-review.php', {
        method: "post",
        body: formData,
    }).then(()=>{
        message.value="";
        grade_review.value=""; 
        load_Review(idTo);
    })
}

function load_Review(idTo){
let formData2 = new FormData()
formData2.append('id_tour_operator', idTo)
fetch('/project-tourOperator/process/reviewSend.php', {
    method:'post',
    body:formData2
}).then((response)=>{
    return response.text();
}).then((data)=>{
    console.log(data)
    document.querySelector('.list-review'+idTo).innerHTML = data
})
}