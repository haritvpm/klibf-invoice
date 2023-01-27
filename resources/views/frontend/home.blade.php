@extends('layouts.frontend')


<script src="{{ asset('js/d3.v6.min.js') }}"></script>
<script src="{{ asset('js/billboard.min.js') }}"></script>


<!-- <link href="{{ asset('css/billboard.min.css') }}" rel="stylesheet" /> -->
<link href="{{ asset('css/insight.min.css') }}" rel="stylesheet" />


<style>

/* #myChart {
  position:relative;
  min-height:auto;
  width:100%;
  display: flex;
  flex-grow:1;
  justify-content: center;
  align-items: center;
} */

</style>

@section('content')
<div class="container-fluid">

    <div class ="row" >
        <div class ="col-md-12"  >
        <div class="mt-0">
             <div id="myChart"></div>   
        </div>
        <div class="mt-0">
             <div id="myChart2"></div>   
        </div>  
        </div>
    </div>
</div>


<script type="text/javascript">
  
  var labels =  {{ Js::from($constituencies) }};
  var users =  {{ Js::from($memberFunds) }};
  var bills =  {{ Js::from($billcount) }};
  const zeroes = new Array(users.length).fill(0);
 
  var chart = bb.generate({
    bindto: "#myChart",
   
   /*  title: {
      text: "Amount"
    }, */
    data: {
      //  x: "x",
        columns: [
            ["Amount", ...users],
            ["Bills", ...bills],
            // ["x", ...labels]
           
        ],
        types: {
             //   data1: "line",
              Amount: "area-spline",
              Bills:  "area-spline",
        },
       /*  colors: {
          Amount: "green",
          Bills: "yellow",
        }, */
        axes: {
          Amount: "y",
          Bills: "y2"
        }
       
    },
    axis: {
            x: {
             
              type: "category",
             
              categories: labels,
                tick: {
                  // rotate: 75,
                  show: false,
                  text: {
                    show: false
                  }
              },
              // height: 130
            },
            y: {
              label: 'amount',
              show: true
            },
            y2: {
              label: 'bills',
              show: true,
              tick: {
                stepSize: 10,
              }
            }
           
    },
    legend: {
      show: false
    },
    area: {
     linearGradient: true
    },
   /*  tooltip: {
      linked: true
    }, */
    boost: {
      useCssRule: true
    },
    size: {
      height: 400,
    },
});
/*
var chart2 = bb.generate({
    bindto: "#myChart2",
   
    data: {
        columns: [
           // ["Amount", ...users],
            ["Bills", ...bills],
           
        ],
        types: {
             //   data1: "line",
             // Amount: "area-spline",
              Bills:  "area",
        },
        colors: {
         // Amount: "green",
          Bills: "red",
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
    legend: {
      show: false
    },
    area: {
     linearGradient: true
    },
    tooltip: {
      linked: true
    },
    boost: {
      useCssRule: true
    },
    size: {
      height: 240,
    },
  });
  */
/*  setTimeout(function() {
    chart.load({
      columns: [
            ["Amount", ...users],
           // ["Bills", ...bills],
           
        ],
      });
    }, 300);   */


</script>

@endsection