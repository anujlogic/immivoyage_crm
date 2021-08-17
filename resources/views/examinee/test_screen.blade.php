<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Random Test</title>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	    <link rel="shortcut icon" href="/image/favicon.ico"/> 
	    <link href="/lib/style/bootstrap.min.css" rel="stylesheet">
	    <link href="{{ asset ('public/css/quiz.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ asset ('public/css/onlinetest.css') }}" rel="stylesheet" type="text/css" />
   	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    </head>  
    <body onload="setTimeForSubmit();" onload="noBack();"  onpageshow="if (event.persisted) noBack();" onunload="">
        <div class="wrapper">
            <!-- 
                <div class="header" id="header">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="/index.jsp"> <img class="logoimg img-responsive" src="/image/logo1.png" title="Programming skills" alt="Programming skills"/></a>
                    </div>
                </div>
            -->
            <form action = "{{ route('examinee.result.store') }}" method="post" name="forma">
                @csrf
                <div class="col-md-8 col-sm-12" id="onlinetest">
                    <div class="panel panel-default">
                            <div>
                               <center>
                                <img src="https://portal.immivoyage.com/public/asset/image/logo.png" alt="AdminLTE Logo" style="width: 220px; height: 139px;">
                                </center>
                            </div>
                        @for($i=1;$i<=40;$i++)
                            <div class="panel-body">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default" id="ques1">
                                        <div class="panel-heading online-test" role="tab" id="">
                                            <h4 class="panel-title">
                                                <a><b>Ques {{$i}} :</b></a>
                                            </h4>
                                        </div>
                                        <div class="panel-collapse online-test-options">
                                            <div class="panel-body">
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       A. <input type="radio" name="opt[{{$i}}]" value="A"> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       B. <input type="radio" name="opt[{{$i}}]" value="B">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       C. <input type="radio" name="opt[{{$i}}]" value="C">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       D. <input type="radio" name="opt[{{$i}}]" value="D">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <input type="hidden" name="assign_id" value="{{ $assignTest->id }}">
                        <button type="submit" class="btn btn-primary online-test-btn">SUBMIT ANSWER</button>
                    </div>
                </div>
            </form>
    </body>
</html>    