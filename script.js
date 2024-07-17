const habitats = {
    savane: {
        name: "Savane",
        description: "La savane est un habitat vaste et ouvert où vivent de nombreux animaux comme les lions et les zèbres.",
        images: ["images/savane1.jpg", "images/savane2.jpg"],
        animals: [
            {
                firstName: "Simba",
                species: "Lion",
                images: ["images/lion1.jpg"],
                vetInfo: {
                    state: "Bonne santé",
                    food: "Viande",
                    foodAmount: "5 kg",
                    visitDate: "2024-07-15",
                    details: "Aucun problème de santé détecté."
                }
            },
            {
                firstName: "Marty",
                species: "Zèbre",
                images: ["images/zebra1.jpg"],
                vetInfo: {
                    state: "En bonne forme",
                    food: "Herbe",
                    foodAmount: "10 kg",
                    visitDate: "2024-07-14",
                    details: "Rien à signaler."
                }
            }
        ]
    },
    jungle: {
        name: "Jungle",
        description: "La jungle est dense et humide, abritant des animaux comme les tigres et les singes.",
        images: ["images/jungle1.jpg", "images/jungle2.jpg"],
        animals: [
            // Ajoutez des animaux ici
        ]
    },
    marais: {
        name: "Marais",
        description: "Les marais sont des zones humides peuplées d'animaux comme les hippopotames et les crocodiles.",
        images: ["images/marais1.jpg", "images/marais2.jpg"],
        animals: [
            // Ajoutez des animaux ici
        ]
    }
};

function showHabitatDetails(habitatKey) {
    const habitat = habitats[habitatKey];
    const habitatInfoDiv = document.getElementById("habitat-info");
    
    let html = `<h2>${habitat.name}</h2>`;
    html += `<p>${habitat.description}</p>`;
    habitat.images.forEach(img => {
        html += `<img src="${img}" alt="${habitat.name}">`;
    });

    html += `<h3>Animaux</h3>`;
    habitat.animals.forEach(animal => {
        html += `
            <div class="animal" onclick="showAnimalDetails('${habitatKey}', '${animal.firstName}')">
                <h4>${animal.firstName} - ${animal.species}</h4>
            </div>
        `;
    });

    habitatInfoDiv.innerHTML = html;
    document.getElementById("habitats").style.display = "none";
    document.getElementById("habitat-details").style.display = "block";
}

function hideHabitatDetails() {
    document.getElementById("habitats").style.display = "flex";
    document.getElementById("habitat-details").style.display = "none";
}

function showAnimalDetails(habitatKey, animalName) {
    const habitat = habitats[habitatKey];
    const animal = habitat.animals.find(a => a.firstName === animalName);
    const habitatInfoDiv = document.getElementById("habitat-info");
    
    let html = `<h2>${animal.firstName} - ${animal.species}</h2>`;
    animal.images.forEach(img => {
        html += `<img src="${img}" alt="${animal.firstName}">`;
    });

    html += `
        <h3>Informations vétérinaires</h3>
        <p>État: ${animal.vetInfo.state}</p>
        <p>Nourriture: ${animal.vetInfo.food}</p>
        <p>Grammage: ${animal.vetInfo.foodAmount}</p>
        <p>Date de passage: ${animal.vetInfo.visitDate}</p>
        <p>Détails: ${animal.vetInfo.details}</p>
    `;

    html += `<button onclick="showHabitatDetails('${habitatKey}')">Retour</button>`;
    habitatInfoDiv.innerHTML = html;
}

document.addEventListener('DOMContentLoaded', function() {
    fetch('get_avis.php')
        .then(response => response.json())
        .then(data => {
            const avisContainer = document.getElementById('avis-container');
            data.forEach(avis => {
                const avisDiv = document.createElement('div');
                avisDiv.classList.add('avis');
                avisDiv.innerHTML = `<h3>${avis.pseudo}</h3><p>${avis.commentaire}</p>`;
                avisContainer.appendChild(avisDiv);
            });
        });
});
