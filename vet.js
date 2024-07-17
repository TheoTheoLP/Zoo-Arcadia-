document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour charger les consommations de nourriture
    function loadFeedings(animalName) {
        fetch(`get_feedings.php?animal-name=${animalName}`)
            .then(response => response.json())
            .then(data => {
                const feedingsContainer = document.getElementById('feedings-container');
                feedingsContainer.innerHTML = '';
                data.forEach(feeding => {
                    const feedingDiv = document.createElement('div');
                    feedingDiv.classList.add('feeding');
                    feedingDiv.innerHTML = `
                        <p>Date: ${feeding.date}</p>
                        <p>Heure: ${feeding.heure}</p>
                        <p>Nourriture: ${feeding.nourriture}</p>
                        <p>Quantité: ${feeding.quantite} g</p>
                    `;
                    feedingsContainer.appendChild(feedingDiv);
                });
            });
    }

    // Gestion du formulaire de requête de consommations
    const feedingQueryForm = document.getElementById('feeding-query-form');
    feedingQueryForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const animalName = document.getElementById('query-animal-name').value;
        loadFeedings(animalName);
    });
});
