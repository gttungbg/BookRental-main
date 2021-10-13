@extends('layouts.master')

@section('title') Profile @endsection

@section('content')

    
      @slot('title')<a href="{{route('dashboard')}}">Dashboard</a> @endslot
         @slot('title_li') Welcome to Qovex Dashboard   @endslot
    
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ol>
      </nav>
   </div>
</div>
@endsection


@section('script')
        <!-- plugin js -->
        <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>
        
        <!-- jquery.vectormap map -->
        <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>
        
        <!-- Calendar init -->
        <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection