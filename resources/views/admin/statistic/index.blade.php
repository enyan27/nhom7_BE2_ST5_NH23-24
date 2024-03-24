@extends('admin.layout.master')

@section('title', 'Statistics')

@section('body')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Sales Statistics</h2>
            </div>
            <div>
                <canvas id="chartSales"></canvas>
            </div>
        </div>
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Order Statistics</h2>
            </div>
            <div class="text-center">
                <canvas style="padding: 20px" id="pieChart"></canvas>
                <strong>Total: {{ array_sum($pieChartData)}} orders</strong>
            </div>
        </div>
    </div>
    <div class="details details3">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Revenue</h2>
                <form action="/admin/statistic">
                    <select name="year" id="year" onchange="this.form.submit();">
                        <option {{request('year') == date("Y") ? 'selected' : '' }}  value=" {{date("Y")}}">{{date("Y")}}</option>
                        <option {{request('year') == date("Y")-1 ? 'selected' : '' }} value="{{date("Y")-1}}">{{date("Y")-1}}</option>
                        <option {{request('year') == date("Y")-2 ? 'selected' : '' }} value="{{date("Y")-2}}">{{date("Y")-2}}</option>
                    </select>   
                </form>
            </div>
            <div>
                <canvas id="chartRevenue"></canvas>
            </div>
        </div>
        <div class="recentOrders ">
            <div class="cardHeader">
                <h2>Summary</h2>
            </div>
            <div>
                <canvas id=""></canvas>
            </div>
        </div>
    </div>
    
    <script src="admin/assets/js/chart.umd.min.js"></script>
    <script>

        const today = new Date();
        // const allDays = getAllDaysInMonth(today.getFullYear(), today.getMonth());
        const dataSales = <?php echo json_encode($barCharData['orders']) ?>;
        const dates = <?php echo json_encode($barCharData['date']) ?>
        // Bar chart Sale
        createBarChar(document.querySelector('#chartSales'), dates, 'Orders', dataSales)
        const month = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        const revenue = <?php echo json_encode($barCharData['revenue']) ?>
        //Bar chart Revenue
        createBarChar(document.querySelector('#chartRevenue'), month, 'USD', revenue)

        function createBarChar(query, label, labelName, data){
            new Chart(query, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    label: labelName,
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            }
        });
        }
        
        //Pie Chart

        new Chart(document.querySelector('#pieChart'), {
            type: 'pie',
            data: {
                labels: ['Pending', 'In Progress', 'Delivered', 'Return', 'Cancel'],
                datasets: [{
                    label: 'Orders',
                    data: <?php echo json_encode($pieChartData) ?>,
                    backgroundColor: [
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgba(255, 99, 132)',
                        'rgb(201, 203, 207)'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        function getAllDaysInMonth(year, month) {
            const date = new Date(year, month, 1);

            const dates = [];

            while (date.getMonth() === month) {
                dates.push(new Date(date).toLocaleDateString('en-US'));
                date.setDate(date.getDate() + 1);
            }

            return dates;           
        }

    </script>
        
@endsection