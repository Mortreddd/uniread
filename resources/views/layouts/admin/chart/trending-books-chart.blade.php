<div class="flex flex-col items-center w-full h-full card">
    <div class="relative w-[60vw] h-[50vh]">
        <canvas class="relative " id="trending"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const genreCounts = {!! json_encode($genreCounts) !!};
        const genreName = [];
        const genreCount = [];
        const genrePercentage = [];
        genreCounts.forEach(genre => {
            genreName.push(genre.name);
            genreCount.push(genre.count);
            genrePercentage.push(genre.percentage);
        })
        const genreColors = [
            '#169c09', '#ab0c19',
            '#d98e25', '#cd6ad4',
            '#8c8848', '#8de342', 
            '#065714', '#5da9e8',
            '#062945', '#3c106e',
            '#96126a', '#f28ad0',
            '#72b0af',
        ];


        new Chart(document.getElementById('trending').getContext('2d'), {
            type: "pie",
            data: {
                labels: genreName,
                datasets: [{
                backgroundColor: genreColors,
                data: genrePercentage
                }]
            },
            options: {
                title: {
                display: true,
                text: `Trending books ${new Date().getFullYear()}`
                }
            }
        });
    });
</script>
