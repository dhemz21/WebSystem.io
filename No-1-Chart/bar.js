/*
    The code below is the property and structure of the chart.
    I did not encounter chart.js library before and I am new to javascript, so most of the code below is not my own.
    I studied the code and quite understand its flow.
    Credits to Abigail Pro, website -> https://abigail.pro/code/creating-charts-with-php-and-mysql-data-without-javascript-knowledge
*/

  $(document).ready(function () {
   showTotalGraph();
  });

  function showTotalGraph(){{

      $.post("chart-connections.php",
      function (data){
          console.log(data);

          var x_variable = [];
          var y_variable = [];

          for (var i in data) {

              x_variable.push(data[i].Name);
              y_variable.push(data[i].Score);
          }

          var options = {
              legend: {
                  display: false
              },
              scales: {
                  xAxes: [{
                      display: true
                  }],
               yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          };

          var chartdata = {
              labels: x_variable,
              datasets: [
                  {
                      label: 'Total',
                      backgroundColor: '#DC7633',
                      borderColor: '#46d5f1',
                      hoverBackgroundColor: '#EDBB99',
                      hoverBorderColor: '#666666',
                      data: y_variable
                  }
              ]
          };


          var graphTarget = $(  "#bar-chartcanvas");
          var barGraph = new Chart(graphTarget, {
              type: 'bar',
              data: chartdata,
              options: options
          });
      });
  }}
