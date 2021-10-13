
@section('title')
   <title>Trang chu</title>

    @endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Home','key'=>' Page'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiVri0OZ1_EcfQAPfqEhJw8QMEwJy1Qenezw&usqp=CAU" alt="">
                    </div>
                    <div class="col-md-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSencQa3X1BVYhsW6yqb741-Q-7pYyMxb1TDg&usqp=CAU" alt="">
                    </div>
                    <div class="col-md-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxrFgCjPgm5BXP9hqle-ZLZAQ5-8di-49wDQ&usqp=CAU" alt="">
                    </div>
                    <div class="col-md-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh8K-A9CkOCZr-n0Pf9KQCuKwkJqNhVyAO7w&usqp=CAU" alt="">
                    </div>

                    <div class="col-md-12">
                        <div class="title" style="text-align: center;margin-top: 10%;font-weight: 700;font-size: 36px; ">
                            <span> Chào Mừng các Bạn đến với BookRental</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

