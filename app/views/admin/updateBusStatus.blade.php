@extends('admin.template')
@section('content')

        <table class="table table-bordered">
            <thead>
              <th>Bus ID</th>
              <th>Bus Plate No</th>
              <th>Bus  Available Seats</th>
              <th>Bus Status</th>
              
            </thead>

          <tbody>
            @foreach($data as $datas)
              <tr>
                <td>{{$datas->busid}}</td>
                <td>{{$datas->busplate_no}}</td>
                <td>{{$datas->availableseats}}</td>
                <td>
                  
                  
                  <div class="btn-group" data-toggle="buttons-radio">
                    <button type="button" val="{{$datas->busid}}" class="btn btn-danger{{$datas->status=='CLOSED'?' active':''}}">CLOSED</button>
                    <button type="button" val="{{$datas->busid}}" class="btn btn-info{{$datas->status=='ONROAD'?' active':''}}">ONROAD</button>
                    <button type="button" val="{{$datas->busid}}" class="btn btn-warning{{$datas->status=='WAITING'?' active':''}}">WAITING</button>
                    <button type="button" val="{{$datas->busid}}" class="btn btn-success{{$datas->status=='ONBOARD'?' active':''}}">ONBOARD</button>
                  </div>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>


@stop 