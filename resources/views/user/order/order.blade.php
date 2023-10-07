  @extends('layouts.app')
  @section('content')
  <div class="row"> 
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Orders  Received     
                  </h4>
                  <h4>Website Commission   {{ $commission }} %</h4>
                  @php
                        $totalAmount = 0;
                  @endphp
                  @foreach ($orders as  $order)
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Paypall Email</th>
                          <th>Payment id</th>
                          <th>Customer Name</th>
                          <th>Amount</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                     
                     
                      <tbody>
                        Product name => {{ $order->name }}
                       
                        @foreach ($order->orders as $order_detail)
                        <tr>
                          <td class="font-weight-bold">
                           {{$order_detail->email}}
                          </td>
                          <td class="text-muted">
                           {{ $order_detail->payment_id}}
                          </td>
                          <td>
                          {{ $order_detail->user->name }}
                          </td>
                          <td>
                            {{ $order_detail->amount }}
                            @php
                            $totalAmount += $order_detail->amount; // Add the amount to the total
                            @endphp
                             </td>
                          <td>
                            <label class="">{{ $order_detail->payment_status }}</label>
                          </td>
                        </tr>
                        <tr>
                        </tr>
                        @endforeach
                      </tbody>
                      @endforeach
                    
                    </table>
             <h3>   Total  earning  =    @php
                    echo  $totalAmount
                     @endphp  </h3>   
                   <h1>    Total Payable amount = @php
                     echo   $totalAmount - ($totalAmount * ($commission/100));
                     
                     @endphp
                     </h1>
                  </div>
                </div>
              </div>
            </div>

            @endsection