$(document).ready(function(){
  function load_ajax(url_load, type_statictis){
    $.ajax({
      url: url_load,
      method: "GET",
      success: function(data) {
        data = JSON.parse(data);
        console.log(data);
        var day = [];
        var income = [];
        var quantities = [];
        for(var i in data) {
          // console.log(data);
          day.push("" + data[i]['day']);
          income.push(data[i]['income']);
          quantities.push(data[i]['quantity']);
        }
        var chartdata = {
          labels: day,
          datasets : [
            {
              label: 'Income '+type_statictis+'($)',
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(59, 89, 152, 0.75)",
              borderColor: "rgba(59, 89, 152, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: income
            },
            {
              label: 'Quantity of product sold per Day (numbers)',
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(255, 120, 255, 0.75)",
              borderColor: "rgba(255, 60, 152, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: quantities
            }
          ]

        };

        var ctx = $("#my-chart");

        var LineGraph = new Chart(ctx, {
          type: 'line',
          axisX:{
           title: "axisX Title",
           gridThickness: 1,
           tickLength: 10
          },
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  }

  load_ajax("http://localhost/cozastore/cozastore/admin/lite_version/load-data-chart.php", "day");
  var types = $('.type-statictis');
  types.each(function() {
    $(this).on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      var type = $(this).attr('data-type');
      for(var i =0;i<types.length;i++){
        $(types[i]).removeClass('active');
      }
      $(this).addClass('active');
      if(type=="day"){
        load_ajax("http://localhost/cozastore/cozastore/admin/lite_version/load-data-chart.php",type);
      }else{
        load_ajax("http://localhost/cozastore/cozastore/admin/lite_version/load-data-month-chart.php",type);
      }
    });
  });
});
