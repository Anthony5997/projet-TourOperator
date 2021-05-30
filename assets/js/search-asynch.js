document.addEventListener('DOMContentLoaded',()=>{
    fetch('process/search-process.php')
    .then((response)=>{
        console.log(response);
        return response.json();
    }).then((results)=>{
        search(results)        
    })
})


function search(results){

    let search = document.querySelector("#search-destination");
    let divDestination = document.querySelector(".destination-list");
    
    search.addEventListener("input", (event)=>{
        searchDestination = event.target.value
        
        divDestination.innerHTML = ''
        results.forEach(result => {
            if (result.location.includes(searchDestination) ) {
                console.log(result);

                divDestination.innerHTML += `
                    <div class="d-flex justify-content-center card col-xl-3 col-md-5 col-sm-12 p-2 m-3 ">
                        <img class="card-img-top" src="${result.photo_link_destination}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Destination : ${result.location}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href='/project-tourOperator/infos-destination.php?destination=${result.location}'>Voir les opérateur proposant cette destination</a><br></li>
                        </ul>
                    </div>`
            }
        });
    });
}


document.addEventListener('DOMContentLoaded',()=>{
    fetch('process/agency-search-process.php')
    .then((response)=>{
        console.log(response);
        return response.json();
    }).then((results)=>{
        searchAgency(results)        
    })
})


function searchAgency(results){

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
                        </div>
                    </div>`
            }
        });
    });
}