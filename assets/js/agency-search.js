document.addEventListener('DOMContentLoaded',()=>{
    fetch('process/agency-search-process.php')
    .then((response)=>{
        console.log(response);
        return response.json();
    }).then((results)=>{
        search(results)        
    })
})


function search(results){

    let search = document.querySelector("#search-agency");
    let divAgency = document.querySelector(".agency-list");
    
    search.addEventListener("input", (event)=>{
        searchAgency = event.target.value
        
        divAgency.innerHTML = ''
        results.forEach(result => {
            if (result.name.includes(searchAgency) ) {
                console.log(result);

                divAgency.innerHTML += `
                    <div class="card-info-destination col-xl-3 col-md-5 col-sm-12 p-2 m-3">
                        <img class="card-img-top" src="${result.photo_link}">
                        <div class="card-info">
                            <h5>${result.name}</h5>
                            <div class="card-sub-info">
                                <p><?=$operator->getGrade()== null ? "Note global : Pas de note pour l'instant" : "Note global : " .  ${result.grade} . " / 5 <br>";?></p>
                            </div>
                        </div>
                    </div>`
            }
        });
    });
}