document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour filtrer les rapports
    function filterReports() {
        const animalFilter = document.getElementById('animal-filter').value;
        const dateFilter = document.getElementById('date-filter').value;

        fetch(`get_reports.php?animal=${animalFilter}&date=${dateFilter}`)
            .then(response => response.json())
            .then(data => {
                const reportsContainer = document.getElementById('reports-container');
                reportsContainer.innerHTML = '';
                data.forEach(report => {
                    const reportDiv = document.createElement('div');
                    reportDiv.classList.add('report');
                    reportDiv.innerHTML = `
                        <h3>${report.animal}</h3>
                        <p>${report.date}</p>
                        <p>${report.state}</p>
                        <p>${report.food}</p>
                        <p>${report.details}</p>
                    `;
                    reportsContainer.appendChild(reportDiv);
                });
            });
    }

    window.filterReports = filterReports;
});
