@extends('layouts.backend-master')

@section('content')
 <!-- Page-Title -->
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Sales</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="notification mt-3 mb-3">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <h3>Hello {{ Auth::user()->name }}</h3>
                @if (Auth::user()->role == 1)
                    <h5>Welcome to Admin Dashboard</h5>
                @elseif (Auth::user()->role == 2)
                    <h5>Welcome to Customer Dashboard</h5>
                @elseif (Auth::user()->role == 3)
                    <h5>Welcome to Supplier Dashboard</h5>
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == 1)
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Total Client</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $total_users ?? 0 }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                        </div>  <!--end col-->
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Total Income</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $total_income ?? 0 }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                        </div>  <!--end col-->
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Total Expense</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $total_expense ?? 0 }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                        </div>  <!--end col-->
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Balance</h4>
                            <h3 class="font-weight-semibold mb-1">
                                @if ($balance_diff < 0)
                                <span class="text-danger">{{ $balance_diff ?? 0 }}</span>
                                @elseif ($balance_diff > 0)
                                <span class="text-primary">{{ $balance_diff ?? 0 }}</span>
                                @else
                                <span class="text-warning">{{ $balance_diff ?? 0 }}</span>
                                @endif
                            </h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-user-group card-eco-icon  align-self-center"></i>
                        </div>  <!--end col-->
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Balance Status</h4>
                    <div class="">
                        <div id="ana_dash_1" class="apex-charts"></div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    @else
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Total Income</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $personal_income ?? 0 }}</h3>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Total Expense</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $personal_expense ?? 0 }}</h3>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Total Balance</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $personal_income - $personal_expense }}</h3>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Income</th>
                            <th>Expense</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                    @forelse ( $personal_balance as $balance )

                        <tbody>

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $balance->income }}</td>
                                <td>{{ $balance->expense }}</td>
                                <td>{{ $balance->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                                <div class="text-center">
                                    <h2 style="color: red; font-weight: bold">Balance Not Found</h2>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>

    @endif

</div><!--end row-->


@endsection

@section('scripts')
<script>
    /**
 * Theme: Crovex - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Dashboard Js
 */

  //colunm-1

var options = {
  chart: {
      height: 300,
      type: 'bar',
      toolbar: {
          show: false
      },
      dropShadow: {
        enabled: true,
        top: 0,
        left: 5,
        bottom: 5,
        right: 0,
        blur: 5,
        color: '#45404a2e',
        opacity: 0.35
    },
  },
  plotOptions: {
      bar: {
          horizontal: false,
          endingShape: 'rounded',
          columnWidth: '25%',
      },
  },
  dataLabels: {
      enabled: false,
  },
  stroke: {
      show: true,
      width: 1,
      colors: ['transparent']
  },
  colors: ["#2c77f4", "#FFFF00","#000000"],
  series: [{
      name: 'Total Income',
      data: @json($ttl_inc)
  }, {
      name: 'Total Expense',
      data: @json($ttl_exp)
  },{
      name: 'Total Balance',
      data: @json($ttl_blnc)
  },],
  xaxis: {
      categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
      axisBorder: {
        show: true,
      },
      axisTicks: {
        show: true,
      },
  },
  legend: {
    offsetY: -10,
  },
  yaxis: {
      title: {
          text: 'Balance'
      }
  },
  fill: {
      opacity: 1,
  },
  // legend: {
  //     floating: true
  // },
  grid: {
      row: {
          colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.2
      },
      borderColor: '#f1f3fa'
  },
  tooltip: {
      y: {
          formatter: function (val) {
              return "" + val + ""
          }
      }
  }
}

var chart = new ApexCharts(
  document.querySelector("#ana_dash_1"),
  options
);

chart.render();


// saprkline chart


var dash_spark_1 = {

  chart: {
      type: 'area',
      height: 60,
      sparkline: {
          enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 5,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.1
    },
  },
  stroke: {
      curve: 'smooth',
      width: 3
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#2c77f4',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.1,
        opacityTo: 0.1,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 16, 5, 11, 6, 11, 30, 10, 13, 4, 6, 3, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#2c77f4'],
}
new ApexCharts(document.querySelector("#dash_spark_1"), dash_spark_1).render();


var dash_spark_2 = {

  chart: {
      type: 'area',
      height: 60,
      sparkline: {
          enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 5,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.1
    },
  },
  stroke: {
      curve: 'smooth',
      width: 3
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#fd3c97',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.1,
        opacityTo: 0.1,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 25, 5, 11, 6, 11, 5, 10, 3, 14, 6, 8, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#fd3c97'],
}
new ApexCharts(document.querySelector("#dash_spark_2"), dash_spark_2).render();



//Device-widget


var options = {
  chart: {
      height: 280,
      type: 'donut',
      dropShadow: {
        enabled: true,
        top: 10,
        left: 0,
        bottom: 0,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.15
    },
  },
  plotOptions: {
    pie: {
      donut: {
        size: '85%'
      }
    }
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  series: [65, 20, 10, 5],
  legend: {
      show: false,
      position: 'bottom',
      horizontalAlign: 'center',
      verticalAlign: 'middle',
      floating: false,
      fontSize: '14px',
      offsetX: 0,
      offsetY: -13
  },
  labels: [ "Excellent", "Very Good", "Good", "Fair"],
  colors: ["#34bfa3", "#5d78ff", "#ff9f43", "#fd3c97"],

  responsive: [{
      breakpoint: 600,
      options: {
        plotOptions: {
            donut: {
              customScale: 0.2
            }
          },
          chart: {
              height: 240
          },
          legend: {
              show: false
          },
      }
  }],

  tooltip: {
    y: {
        formatter: function (val) {
            return   val + " %"
        }
    }
  }

}

var chart = new ApexCharts(
  document.querySelector("#ana_device"),
  options
);

chart.render();

</script>
@endsection
