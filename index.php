<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Soon!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet" / -->
        <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:700" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style type="text/css">
        #bg_image{
            background:url('clock.jpg') no-repeat center center fixed;
            background-size:cover;
        }
        .row {
            margin: 0px;
        }
        .full_screen{
            margin: 0px;
            position: fixed;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
        }
        #black_box{
            opacity: .8;
            background:#000;
        }
        #noise_box{
            opacity: .15;
            /*background:#000;*/
            background:url('noise.png') repeat;
            color:#fff;
        }
        #clear_box{
            opacity: 1;
            color:#fff;
            padding:5px;
        }
        .ruqaa_font{
            font-family: 'Aref Ruqaa', serif;
            letter-spacing: 0.02em;
            word-spacing: 0.5em;
        }
        .size_4{
            font-size: 4em;
        }
        .size_6{
            font-size: 6em;
        }
        .size_8{
            font-size: 8em;
        }
        .center{
            text-align:center;
        }
        .outline{
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        }
        .heading_1{
            font-size:4em;
        }
        .heading_2{
            font-size:3em;
        }
        .heading_3{
            font-size:2em;
        }
        .prose{
            color:#FFD;
            font-size:1.2em;
            text-align:justify;
        }
        .quote{
            padding-left:10px;
            border-left:2px solid;
            font-size:1.15em;
        }
        .black_row{
            background:#000;
            opacity:1;
            padding-top:10px;
            padding-bottom:10px;
        }
        #thank_4_email{
            display:none;
        }
        form input{
            color:#000;
            font-size:1.2em;
            letter-spacing: 0.05em;
            word-spacing: 0.5em;
        }
        /*div{
            outline:#000 solid 1px;
            
        }*/
        .lnk{
            color:#FF5;
        }
        </style>
    </head>
    <body>
        <div id="bg_image" class="full_screen"></div>
        <div id="black_box" class="full_screen"></div>
        <div id="noise_box" class="full_screen"></div>
        <div id="clear_box" class="container-fluid ruqaa_font outline">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center">
                    <span class="size_6 outline heading_1">Project Soon!</span>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <span class="heading_3">What is project Soon!?</span>
                    <p class="prose">Project Soon! is a place holder system for your next great idea. It provides a template desigend to wet your user's apetite, collect an email address, provide them your social media endpoints and more.</p>
                    <span class="heading_3">Why is it called Soon!?</span>
                    <p class="prose">When I started building this "Coming Soon" project, The first thing that came to my mind was the hilarius dialog between Sooni and Naseem Ali Khan from the TV show, Indian Summers.</p>
                    <p class="quote">Khan: <i>Ah, the terror of tort! So why are you not in court now? - Today? </i><br/>
                    Sooni: <i>I will be, soon.</i><br/>
                    Khan: <i>Soon? This is why they call you Sooni?</i><br/>
                    Sooni: <i>What a very simple-minded pun! Anyway, fool, don't mock me.</i></p>
                    <span class="heading_3">Who uses project Soon!?</span>
                    <p class="prose">Project Soon! is used by go getter entrepreneurs with great idea, who start on execution immideately. Our users register a domain and put up a <em>"Comming Soon"</em> page as soon as they get an idea. This lets people who come across the page to leave their email address giving the entrepreneurs a head start with customer acquistion.</p>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <span class="heading_3">Please help us out with this short survey</span>
                    <p>
                        <form>
                            
                        </form>
                    </p>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center black_row">
                    <div id="email_form">
                        <span class="heading_3">Stay infomed</span>
                        <p>
                            <form>
                            <input type="text" id="email_id" placeholder="the_exalted_me@example.com" style="width:68%" class="center" /><br/><br/>
                            May we have your location to optimize our service? <input type="checkbox" id="loc_agree"/> Yes<br/><br/>
                            <input type="button" id="submit_email" value="Keep me infomed" />
                            </form>
                        </p>
                    </div>
                    <div id="thank_4_email">
                        <span class="heading_3">Thank you.<br/>We shall be in touch.</span>
                        <br/>
                        <span class="lnk" id="get_form">subscribe another email</span>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            var k;
            $(document).ready(function(){
                $("#submit_email").click(function(){
                    var email_obj={};
                    if ($.trim($("#email_id").val())!=""){
                        email_obj['email_id']=$("#email_id").val();
                        if($('#loc_agree').prop("checked")){
                             if (navigator.geolocation){
                                navigator.geolocation.getCurrentPosition(function(p){
                                    email_obj['geo']=p.coords;
                                    ajax_email_info(email_obj);
                                });
                             }
                        }else{
                            ajax_email_info(email_obj);
                        }
                    }
                });
                $("#get_form").click(function(){
                    $("#email_form").show();
                    $("#thank_4_email").hide();
                });
            });
            function ajax_email_info(email_obj){
                $.ajax({url:"save_email.php", type:"POST", data: email_obj, dataType:"json"} ).done(function(dta,sts,xho){
                    if (dta.result==0){
                        $("#email_id").val('');
                        $("#email_form").hide();
                        $("#thank_4_email").show();
                    }
                    console.log( xho.status+" success ");
                    console.log(dta)
                    k=xho;
                }).fail(function(d){
                    console.log("fail:"+d)
                });
            }
        </script>
    </body>
</html>
    