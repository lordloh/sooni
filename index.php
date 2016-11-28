<?php
require_once('parsedown.php');
require_once('parsedownExtra.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Soon!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet" / -->
        <link href="jqui/jquery-ui.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:700" rel="stylesheet" />
        <link href="social_media.css" rel="stylesheet" />
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
        .media_row{
            word-spacing:15px;
            background:#353;
            opacity:.6;
            padding-top:20px;
            padding-bottom:20px;
        }
        .social_media_icons{
            font-size:2em;
        }
        .social_media_icons a{
            text-decoration:none;
            color:#FFF;
        }
        .social_media_icons a:visited{
            color:#FFF;
        }
        .social_media_icons a:link{
            color:#FFF;
        }
        .social_media_icons a:hover{
            text-shadow: 0px 7px 30px rgba(150, 255, 150, 1);
            font-size:0.95;
        }
        .social_media_icons a:active{
            color:#020;
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
        #error{
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
        .surveyQ{
            margin:25px 0px 25px;
        }
        .surveyQ input{
            color:#000;
        }
        .surveyQ textarea{
            color:#000;
        }
        .cookie_bar{
            position:absolute;
            top:0px;
            right:0px;
            left:0px;
            background:#FFF;
            color:#000;
            z-index:9000;
        }
        .footer{
            font-size:12px;
        }
        .not_now{
            display:none;
        }
        </style>
    </head>
    <body>
        <div id="bg_image" class="full_screen"></div>
        <div id="black_box" class="full_screen"></div>
        <div id="noise_box" class="full_screen"></div>
        <div id="clear_box" class="container-fluid ruqaa_font">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ui-state-highlight style" id="cookie_bar" style="padding:5px; display:none">
                    <span class="ui-icon ui-icon-info"></span>This site uses cookies. Okay?. Okay! Now click to dismiss.
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center">
                    <span class="outline heading_1">Project Soon!</span>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <?php
                        $md = new ParsedownExtra();
                        $col_left=@file_get_contents('left.md');
                        echo $md->text($col_left);
                    ?>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div id="survey_thank" class="not_now">
                        <span class="heading_3">Thank you for your response</span>
                    </div>
                    <div id="survey_err" class="not_now">
                        <span class="heading_3">Something went wrong.</span>
                        <p class="prose">Please try again after some time.</p>
                        <span class="msg"></span>
                    </div>
                    <div id="survey_form" class="not_now">
                        <span class="heading_3">Please help us out with this short survey</span>
                        <div class="surveyQ">
                            <p calss="prose">How many domains do you own?</p>
                            <input type="number" id="num_domains" min="0" />
                        </div>
                        <div class="surveyQ">
                            <p calss="prose">Did you buy any of them from a domain shark?</p>
                            <input type="checkbox" id="shark"> Yes
                        </div>
                        <div class="surveyQ">
                            <p calss="prose">Where do you host your site?</p>
                            <textarea id="host" rows="4" style="width:100%" placeholder="aws, rackspace, google, mom&pop hosting, azure" class="placeholder_replace"></textarea>
                        </div>
                        <div class="surveyQ">
                            <input type="button" id="survey_save" value="Save" />
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center media_row">
                    <span class="social_media_icons">
                        <?php include('social_media.html'); ?>
                    </span>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center black_row">
                    <div id="email_form">
                        <span class="heading_3">Stay infomed</span>
                        <p>
                            <form>
                            <input type="email" id="email_id" placeholder="me@example.com" style="width:68%" class="center placeholder_replace" /><br/><br/>
                            <div class="checkbox"><label>May we have your location to optimize our service?<br/><input type="checkbox" id="loc_agree"/>Yes</label></div><br/><br/>
                            <input type="button" id="submit_email" value="Keep me infomed"/>
                            </form>
                        </p>
                    </div>
                    <div id="thank_4_email">
                        <span class="heading_3">Thank you.<br/>We shall be in touch.</span>
                        <br/>
                        <span class="lnk get_email_form">subscribe another email</span>
                    </div>
                    <div id="error">
                        <span class="heading_3">Sorry!</span>
                        <p>Something went wrong. Please contact us.</p>
                        <br/>
                        <span class="lnk get_email_form">subscribe another email</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <hr/>
                    <p class="footer">Powered by project <a href="https://github.com/lordloh/sooni">soon!</a>. Licensed under the MIT License.</p>
                </div>
            </div>
        </div>
        <script src="js.cookie.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="jqui/jquery-ui.js"></script>
        <script>
            var k;
            $(document).ready(function(){
                var Cookies2 = Cookies.noConflict();
                if (Cookies2.get('cookie_info')==true | Cookies2.get('cookie_info')!=undefined){
                    $("#cookie_bar").hide();
                }else{
                    $("#cookie_bar").show();
                }
                if (Cookies2.get('survey_done')==false | Cookies2.get('survey_done')!=undefined){
                    $("#survey_form").hide();
                    $("#survey_thank").show();
                }else{
                    $("#survey_thank").hide();
                    $("#survey_form").show();
                }
                $("#cookie_bar").click(function(){
                    $(this).hide();
                    Cookies2.set('cookie_info',true,{expires: 1});
                });
                $("#d_box").dialog({autoOpen:false});
                $(".d_box_info").click(function(){
                    $("#d_box").html(($(this).attr("data-info")));
                    $("#d_box").dialog("open");
                });
                $(".placeholder_replace").focus(function(){
                    $(this).attr("data-placeholder",$(this).attr("placeholder"))
                    $(this).prop("placeholder","");
                }).blur(function(){
                    $(this).prop("placeholder",$(this).attr("data-placeholder"));
                });
                
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
                $("#survey_save").click(function(){
                    var survey_obj={};
                    survey_obj['num_domains']=$("#num_domains").val();
                    survey_obj['shark']=($("#shark").prop("checked"))?1:0;
                    survey_obj['host']=$("#host").val();
                    ajax_survey(survey_obj);
                });
                // email form
                $(".get_email_form").click(function(){
                    $("#email_form").show();
                    $("#thank_4_email").hide();
                    $("#error").hide();
                });
                //survey form
            });
            
            function ajax_survey(survey_obj){
                console.log(survey_obj);
                $.ajax({url:"save_survey.php", type:"POST", data: survey_obj, dataType:"json"} ).done(function(dta,sts,xho){
                    if (dta.result==0){
                        Cookies2.set('survey_done',true,{expires: 6});
                        $("#survey_form").hide();
                        $("#survey_err").hide();
                        $("#survey_thank").show();
                    }else{
                        console.log("Something went wrong");
                        $("#survey_err > .msg").html("<pre>"+dta+"</pre>");
                        $("#survey_form").hide();
                        $("#survey_err").show();
                        $("#survey_thank").hide();
                    }
                    console.log( xho.status+" success ");
                    k=xho;
                }).fail(function(d){
                    $("#survey_err > .msg").html("<pre>"+dta+"</pre>");
                    $("#survey_form").hide();
                    $("#survey_err").show();
                    $("#survey_thank").hide();
                });
            }
            
            function ajax_email_info(email_obj){
                $.ajax({url:"save_email.php", type:"POST", data: email_obj, dataType:"json"} ).done(function(dta,sts,xho){
                    if (dta.result==0){
                        $("#email_id").val('');
                        $("#email_form").hide();
                        $("#error").hide();
                        $("#thank_4_email").show();
                    }else{
                        $("#email_form").hide();
                        $("#error").show();
                        $("#thank_4_email").hide();
                    }
                    console.log("Email AJAX Success");
                    k=xho;
                }).fail(function(d){
                    $("#email_form").hide();
                    $("#error").show();
                    $("#thank_4_email").hide();
                });
            }
        </script>
    </body>
</html>
    