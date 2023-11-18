<div class="flex flex-col items-center w-full h-full card">
    <div class="flex justify-center w-full gap-3 mb-3">
        <h1 class="flex flex-row items-center text-2xl text-black font sans"><span class="flex w-3 h-3 mr-2 bg-green-500 rounded-full me-3"></span>Active Authors</h1>
        <h1 class="flex flex-row items-center text-2xl text-black font sans"><span class="flex w-3 h-3 mr-2 bg-red-500 rounded-full me-3"></span>Inactive Authors</h1>
    </div>
    <div class="relative w-[60vw] h-[50vh]">
        <canvas class="relative " id="authorChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const activeAuthorsData = {!! json_encode($activeAuthorsChart) !!};
        const inActiveAuthorsData = {!! json_encode($inActiveAuthorsChart) !!};

        const months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        const activeDataMonths = Array.from({ length: 12 }, () => 0);
        const inActiveDataMonths = Array.from({ length: 12 }, () => 0);

        activeAuthorsData.forEach(data => {
            const monthIndex = months.indexOf(data.month);
            if (monthIndex !== -1) {
                activeDataMonths[monthIndex] = data.total;
            }
        });

        inActiveAuthorsData.forEach(data => {
            const monthIndex = months.indexOf(data.month);
            if (monthIndex !== -1) {
                inActiveDataMonths[monthIndex] = data.total;
            }
        });

        new Chart(document.getElementById('authorChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Active Authors',
                        data: activeDataMonths,
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Inactive Authors',
                        data: inActiveDataMonths,
                        borderColor: 'red',
                        fill: false
                    }
                ]
            },
            options: {
                legend: { display: false }
            }
        });
    });
</script>
