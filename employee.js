document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour charger les avis
    function loadReviews() {
        fetch('get_reviews.php')
            .then(response => response.json())
            .then(data => {
                const reviewsContainer = document.getElementById('reviews-container');
                reviewsContainer.innerHTML = '';
                data.forEach(review => {
                    const reviewDiv = document.createElement('div');
                    reviewDiv.classList.add('review');
                    reviewDiv.innerHTML = `
                        <p>${review.pseudo}</p>
                        <p>${review.avis}</p>
                        <button onclick="updateReview(${review.id}, 'approve')">Approuver</button>
                        <button onclick="updateReview(${review.id}, 'disapprove')">Désapprouver</button>
                    `;
                    reviewsContainer.appendChild(reviewDiv);
                });
            });
    }

    // Fonction pour mettre à jour un avis
    function updateReview(reviewId, action) {
        fetch('validate_reviews.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `review_id=${reviewId}&action=${action}`,
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            loadReviews();
        });
    }

    window.updateReview = updateReview;
    loadReviews();
});
