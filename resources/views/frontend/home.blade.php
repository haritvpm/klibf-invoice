@extends('layouts.frontend')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

#myChart {
  position:relative;
  min-height:auto;
  width:100%;
  display: flex;
  flex-grow:1;
}
</style>

@section('content')
<div class="container-fluid ">
    <div class ="row justify-content-center" >
        <div class ="col-md-12 "  >
                <div  style="position:absolute; top:60px; left:10px; width: 1200px; height:600px;">
                    
                        <canvas  id="myChart"  ></canvas>
                    
                </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  
      var labels =  {{ Js::from($constituencies) }};
      var users =  {{ Js::from($memberFunds) }};
      Chart.defaults.font.size = 8;

      const data = {
        labels: labels,
        datasets: [{
          label: 'Constituency Amounts',
          backgroundColor: [
         
            'rgba(54, 162, 235, 0.5)',
      
            ],
            /* borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ], */
        
         borderWidth: 2,

          data: users,
          tension: 0.1,
          borderColor: 'rgb(75, 192, 192)',
          fill: true,

        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
   
</script>

@endsection