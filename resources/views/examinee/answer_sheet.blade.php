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
                        <h4 class="panel-title">Total Attempt Questions {{ $total_attempt_qstn }} Out of 40.</h4>
                        @foreach(json_decode($assignTest->answer) as $key=>$val)
                            <div class="panel-body">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default" id="ques1">
                                        <div class="panel-heading online-test" role="tab" id="">
                                            <h4  class="panel-title">
                                                <a><b>Ques {{$key}} :</b></a>
                                            </h4>
                                        </div>
                                        <div class="panel-collapse online-test-options">
                                            <div class="panel-body">
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       A. <input type="radio" value="A" {{ ($val=="A")? "checked" : "" }} disabled> 
                                                    </div>
                                                </div>  
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       B. <input type="radio" value="B" {{ ($val=="B")? "checked" : "" }} disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       C. <input type="radio" value="C" {{ ($val=="C")? "checked" : "" }} disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 quiz-answer">
                                                    <div class="input-group">
                                                       D. <input type="radio" value="D" {{ ($val=="D")? "checked" : "" }} disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
    </body>
</html>    