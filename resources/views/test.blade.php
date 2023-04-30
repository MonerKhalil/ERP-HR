<!DOCTYPE HTML>
<html>
<head>
    <title>Customers Information</title>
    <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
{{--    <!-- Fontawsome -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<div class="d-flex justify-content-center profile-container">
    <div class='col-md-10 text-center sort-profile' id='sort-profile'>
        <div class='row'>
            <div class='col-md-12 text-center' ><br/>
                <h4><b>Customer Details</b></h4><hr/>
                <table class='table table-light table-striped table-bordered' id='excel-table' style="background-color: transparent; border:2px solid black; margin-top:15px;">
                    <tr>
                        @foreach($data['head'] as $value)
                            <th class="text-center">{{$value}}</th>
                        @endforeach
                    </tr>
                    @foreach($data['body'] as $value)
                        <tr>
                            @foreach($value as $item)
                                <td class="text-center">{{$item}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <hr/>
    </div>
</div>
</body>
</html>
