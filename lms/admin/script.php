
							 

<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($subject) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'No. of student in class',
      data: <?php echo json_encode($count) ?>,
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)'
      ],
      borderColor: [
        'rgb(54, 162, 235)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Account Status', 'Count'],
  ['Activated', <?php echo $count_activated ?>],
  ['Deactivated', <?php echo $count_deactivated ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Teacher Account Status', 'width':500, 'height':370};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>