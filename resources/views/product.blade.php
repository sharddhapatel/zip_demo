<html>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <!-- <div style="float: left;">
                        <button type="submit" class="btn btn-primary"><a href="#" style="color: white;">Show product</a></button>
                    </div> -->
                    <br><br>
                    <div class="login-content">
                        <!-- <div class="login-logo">
                            <h4>Category</h4>
                        </div> -->
                        <div class="login-form">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                <i class="fa-lg fa fa-warning"></i>
                                {!! session('message') !!}
                            </div>
                            @elseif(Session::has('error'))
                            <div class="alert alert-danger">
                                <i class="fa-lg fa fa-warning"></i>
                                {!! session('error') !!}
                            </div>
                            @endif
                            <center>
                                <form class="form-horizontal" action="{{url('insproduct')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="file" name="myfile[]" multiple id="fileToUpload">
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <br><br><br>
                                </form>
                                <a href="{{url('downloadZip')}}"><input type='submit' name='myfile' value='Download'/></a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
