<?php
$DB = "sooni.db"
?>
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
        form input{
            color:#000;
            font-size:1.2em;
            letter-spacing: 0.05em;
            word-spacing: 0.5em;
        }
        /*div{
            outline:#000 solid 1px;
            
        }*/
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
                    
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 center black_row">
                        <?php
                            if (array_key_exists('submit',$_POST)){
                                if (!empty($_POST['email_id'])){
                                    $email = filter_var($_POST['email_id'], FILTER_SANITIZE_EMAIL);
                                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        //
                                        $email_db = new SQLite3($DB);
                                        $email_db->busyTimeout(1000);
                                        $email_db->exec('CREATE TABLE IF NOT EXISTS email (email STRING, date STRING, PRIMARY KEY(email))');
                                        $submit_date = date('Y-m-d H:i:s');
                                        $ins=$email_db->exec("INSERT OR IGNORE INTO email VALUES('".$email."', '".$submit_date."')");
                                        $email_db->close();
                                        echo "<span class=\"heading_3\">Thank you for subscribing.</span><p>We will get in touch.</p>";
                                    }else{
                                        echo "<span class=\"heading_3\">Bad email</span>";
                                    }
                                }
                            }else{
                        ?>
                    <span class="heading_3">Stay infomed</span>
                    <p>
                        <form action="index.php" method="post">
                        <input type="text" name="email_id" placeholder="bharath.lohray@example.com" style="width:68%" class="center" /><br/><br/>
                        <input type="submit" name="submit" value="Keep me infomed" />
                        </form>
                        <?php
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        
    </body>
</html>
    