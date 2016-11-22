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
                    <?php
                        $md = new ParsedownExtra();
                        $col_left=@file_get_contents('left.md');
                        echo $md->text($col_left);
                    ?>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <span class="heading_3">Please help us out with this short survey</span>
                    <p>
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
                            <textarea rows="4" style="width:100%" placeholder="aws, rackspace, google, mom&pop hosting, azure"></textarea>
                        </div>
                        <div class="surveyQ">
                            <input type="button" id="survey_save" value="Save" />
                        </div>
                    </p>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center media_row">
                    <span class="social_media_icons">
                        <a><span class="icon-envelop" title="email"></span></a>
                        <a><span class="icon-key2"></span></a>
                        <a><span class="icon-phone" title="phone"></span></a>
                        <a><span class="icon-bubbles3" title="Chat"></span></a>
                        <a><span class="icon-map" title="Address"></span></a>
                        <a><span class="icon-graduate" title="CV"></span></a>
                        <a href="https://www.facebook.com/bharath.lohray"><span title="facebook" class="icon-google-plus3"></span></a>
                        <a href="https://www.facebook.com/bharath.lohray"><span class="icon-facebook2"></span></a>
                        <a href="https://www.twitter.com/lordloh"><span class="icon-twitter"></span></a>
                        <a href="https://www.linkedin.com/in/lohray"><span class="icon-linkedin2"></span></a>
                        <a><span class="icon-yelp"></span></a>
                        <a><span class="icon-instagram"></span></a>
                        <a><span class="icon-pintrest"></span></a>
                        <a><span class="icon-youtube"></span></a>
                        <a><span class="icon-vimeo2"></span></a>
                        <a><span class="icon-flickr4"></span></a>
                        <a><span class="icon-tumblr2"></span></a>
                        <a><span class="icon-blogger2"></span></a>
                        <a><span class="icon-wordpress"></span></a>
                        <a><span class="icon-reddit"></span></a>
                        <a><span class="icon-stackoverflow"></span></a>
                        <a href="https://github.com/lordloh"><span class="icon-github"></span></a>
                        <a href="https://bitbucket.org/lordloh"><span class="icon-bitbucket"></span></a>
                        <a><span class="icon-paypal"></span></a>
                    </span>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center black_row">
                    <div id="email_form">
                        <span class="heading_3">Stay infomed</span>
                        <p>
                            <form>
                            <input type="text" id="email_id" placeholder="the_exalted_me@example.com" style="width:68%" class="center" /><br/><br/>
                            <div class="checkbox"><label>May we have your location to optimize our service?<br/><input type="checkbox" id="loc_agree"/>Yes</label></div><br/><br/>
                            <input type="button" id="submit_email" value="Keep me infomed" />
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
        <div class="cokie_bar">This site uses cookies! Okay!</div>
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
                // email form
                $(".get_email_form").click(function(){
                    $("#email_form").show();
                    $("#thank_4_email").hide();
                    $("#error").hide();
                });
                //survey form
                
            });
            
            function ajax_survey(email_obj){
                $.ajax({url:"save_survey.php", type:"POST", data: email_obj, dataType:"json"} ).done(function(dta,sts,xho){
                    if (dta.result==0){
                        
                        /*$("#email_form").hide();
                        $("#error").hide();
                        $("#thank_4_email").show();*/
                    }else{
                        /*$("#email_form").hide();
                        $("#error").show();
                        $("#thank_4_email").hide();*/
                    }
                    console.log( xho.status+" success ");
                    console.log(dta)
                    k=xho;
                }).fail(function(d){
                    /*$("#email_form").hide();
                    $("#error").show();
                    $("#thank_4_email").hide();*/
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
                    console.log( xho.status+" success ");
                    console.log(dta)
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
    