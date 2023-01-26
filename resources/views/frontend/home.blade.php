@extends('layouts.frontend')


<script src="{{ asset('js/d3.v6.min.js') }}"></script>
<script src="{{ asset('js/billboard.min.js') }}"></script>


<!-- <link href="{{ asset('css/billboard.min.css') }}" rel="stylesheet" /> -->
<link href="{{ asset('css/insight.min.css') }}" rel="stylesheet" />


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
    <div class ="row " >
        <div class ="col-md-12 justify-content-center align-items-center"  >
               
                     <div id="myChart"></div>   
               
        </div>
    </div>
</div>


<script type="text/javascript">
  
      var labels =  {{ Js::from($constituencies) }};
      var users =  {{ Js::from($memberFunds) }};

      bb.generate({
    bindto: "#myChart",
    data: {
        columns: [
            ["Amount", ...users],
           
        ],
        types: {
             //   data1: "line",
             Amount: "area-spline"
        },
        colors: {
          Amount: "green"
        },
       
    },
    axis: {
            x: {
              type: "category",
              categories: labels,
                tick: {
                show: false,
                text: {
                  show: false
                }
              }
            },
           
          },
});
   
</script>

@endsection