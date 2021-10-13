@extends('login.master')
@section('title')
    <title>{{ __('Borrow') }}</title>
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @include('partials.content-header,['name' => __('Borrow')])
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th style="width:50px;">
                                    <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                        <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th><strong>ROLL NO.</strong></th>
                                <th><strong>{{ __('user') }}</strong></th>
                                <th><strong>{{ __('date') }}</strong></th>
                                <th><strong>{{ __('money') }}</strong></th>
                                <th><strong>{{ __('action') }}</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($borrows))
                                    @foreach($borrows as $key => $borrow)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                        required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td><strong>{{ $key }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="w-space-no">{{ __($borrow->users->email) }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>{{ __('Request Date') .': '. $borrow->request_date }}</li>
                                                    <li>{{ __('Borrow Date') .': '. $borrow->borrow_date }}</li>
                                                    <li>{{ __('Return Date') .': '. $borrow->return_date }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>{{ __('Amount') .': '. number_format($borrow->amount) }} VND</li>
                                                    <li>{{ __('Deposit') .': '. number_format($borrow->deposit) }} VND</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                        {!! $borrow->status  !!}
                                                        <div class="dropdown-menu">
                                                            @foreach (config('status.getStatus') as $key => $status)
                                                                <a class="dropdown-item" href="{{ route('borrow.status',['id' => $borrow->id]).'?status='.$key }}">{{ $status }}</a>
                                                            @endforeach
                                                        </div>
                                                     </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('borrow.show',['id' => $borrow->id]) }}"
                                                    class="btn btn-primary">
                                                     Edit
                                                     <i class="fa fa-pencil"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
