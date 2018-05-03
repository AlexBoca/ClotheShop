<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ClotheShop</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<header>
    <div class="bg-dark collapse" id="navbarHeader" style="">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4" style="align-self: center;">
					<?php if (empty($_SESSION['user'])) { ?>
                        <form class="navbar-form" role="search" method="post" action="<?php echo url('/login') ?>">
                            <div class="form-group" style="display: inline-block">
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group" style="display: inline-block">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="submit" style="vertical-align: initial" class="btn btn-primary my-2">Sign In
                            </button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#register-user">
                            Register
                        </button>
					<?php } else { ?>

                        <h1 class="jumbotron-heading text-white">Welcome <?php echo $_SESSION['user']->name ?></h1>

					<?php } ?>


                    <!-- START MODAL -->
                    <div class="modal fade" id="register-user" tabindex="-1"
                         aria-labelledby="register-user-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="register-user-label">User Register Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="<?php echo url('/register') ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="register-name" class="col-form-label">Name</label>
                                            <input type="text" class="form-control" name="register-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="register-email" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" name="register-email">
                                        </div>
                                        <div class="form-group">
                                            <label for="register-phone" class="col-form-label">Phone</label>
                                            <input type="text" class="form-control" name="register-phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="register-password" class="col-form-label">Password</label>
                                            <input type="password" class="form-control" name="register-password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" value="Register" name="register" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo url('/') ?>" class="text-white">Home</a></li>
                        <li><a href="<?php echo url('/cart') ?>"
                               class="text-white">Cart <?php echo $_SESSION['cart']->count(); ?></a></li>
						<?php if (isset($_SESSION['user'])) { ?>
							<?php if ($_SESSION['user']->is_admin) { ?>
                                <li><a href="<?php echo url('/admin/products') ?>" class="text-white">Admin</a></li>
							<?php } ?>
                            <li><a href="<?php echo url('/logout') ?>" class="text-white">Logout</a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="<?php echo url('/') ?>" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>ClotheShop</strong>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                        data-target="#send-email">
                    Send email
                </button>
                <a href="<?php echo url('/cart/delete/all') ?>" class="btn btn-danger my-2">Delete All</a>
            </p>
        </div>
    </section>

    <div class="modal fade" id="send-email" tabindex="-1"
         aria-labelledby="send-email-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="send-email-label">Send email form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo url('/cart/send/email') ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" value="<?php if (isset($_SESSION['user'])) {
								echo $_SESSION['user']->email;
							} ?>" class="form-control" name="email">
                        </div>

                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th colspan="2" scope="col">Product Name</th>
                                <th colspan="2" scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($products as $product) : ?>
                                <tr>
                                    <td colspan="2"><?php echo $product->title ?></td>
                                    <td colspan="2"> <?php echo $product->price . ' $' ?> </td>

                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                        <button type="submit" value="Send email" name="send-email" class="btn btn-primary">
                            Send Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
				<?php
				foreach ($products as $product) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                                 src="<?php echo $product->image; ?>"
                                 data-holder-rendered="true">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $product->title; ?></h5>
                                <p class="card-text"><?php echo $product->description; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
										<?php if ($_SESSION['cart']->has($product->id)): ?>
                                            <a href="<?php echo url('/cart/delete', ['product' => $product->id]) ?>"
                                               class="btn btn-sm btn-outline-danger">Remove from Cart
                                            </a>
										<?php else: ?>
                                            <a href="<?php echo url('/cart/store', ['product' => $product->id]) ?>"
                                               class="btn btn-sm btn-outline-info">Add to Cart
                                            </a>
										<?php endif; ?>
                                    </div>
                                    <h6 class="text-muted"><?php echo $product->price . ' $'; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../..">Visit the homepage</a> or read our <a href="../../getting-started/">getting
                started guide</a>.</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>


<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none"
     style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
    <defs>
        <style type="text/css"></style>
    </defs>
    <text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">
        Thumbnail
    </text>
</svg>
<div id="SL_balloon_obj" alt="0" style="display: block;">
    <div id="SL_button" class="SL_ImTranslatorLogo"
         style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/imtranslator-s.png&quot;); display: none;"></div>
    <div id="SL_shadow_translation_result2" style="display: none;"></div>
    <div id="SL_shadow_translator" style="display: none;">
        <div id="SL_planshet">
            <div id="SL_arrow_up"
                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/up.png&quot;);"></div>
            <div id="SL_Bproviders">
                <div class="SL_BL_LABLE_ON" title="Google" id="SL_P0">G</div>
                <div class="SL_BL_LABLE_ON" title="Microsoft" id="SL_P1">M</div>
                <div class="SL_BL_LABLE_ON" title="Translator" id="SL_P2">T</div>
            </div>
            <div id="SL_alert_bbl" style="display: none;">
                <div id="SLHKclose"
                     style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/delete.png&quot;);"></div>
                <div id="SL_alert_cont"></div>
            </div>
            <div id="SL_TB">
                <table id="SL_tables" cellspacing="1">
                    <tr>
                        <td class="SL_td" width="10%" align="right"><input id="SL_locer" type="checkbox"
                                                                           title="Lock-in language"></td>
                        <td class="SL_td" width="20%" align="left"><select id="SL_lng_from"
                                                                           style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/select.png&quot;) 100% 0px no-repeat rgb(255, 255, 255);">
                                <option value="auto">Detect language</option>
                                <option value="af">Afrikaans</option>
                                <option value="sq">Albanian</option>
                                <option value="ar">Arabic</option>
                                <option value="hy">Armenian</option>
                                <option value="az">Azerbaijani</option>
                                <option value="eu">Basque</option>
                                <option value="be">Belarusian</option>
                                <option value="bn">Bengali</option>
                                <option value="bs">Bosnian</option>
                                <option value="bg">Bulgarian</option>
                                <option value="ca">Catalan</option>
                                <option value="ceb">Cebuano</option>
                                <option value="ny">Chichewa</option>
                                <option value="zh-CN">Chinese (Simplified)</option>
                                <option value="zh-TW">Chinese (Traditional)</option>
                                <option value="hr">Croatian</option>
                                <option value="cs">Czech</option>
                                <option value="da">Danish</option>
                                <option value="nl">Dutch</option>
                                <option value="en">English</option>
                                <option value="eo">Esperanto</option>
                                <option value="et">Estonian</option>
                                <option value="tl">Filipino</option>
                                <option value="fi">Finnish</option>
                                <option value="fr">French</option>
                                <option value="gl">Galician</option>
                                <option value="ka">Georgian</option>
                                <option value="de">German</option>
                                <option value="el">Greek</option>
                                <option value="gu">Gujarati</option>
                                <option value="ht">Haitian Creole</option>
                                <option value="ha">Hausa</option>
                                <option value="iw">Hebrew</option>
                                <option value="hi">Hindi</option>
                                <option value="hmn">Hmong</option>
                                <option value="hu">Hungarian</option>
                                <option value="is">Icelandic</option>
                                <option value="ig">Igbo</option>
                                <option value="id">Indonesian</option>
                                <option value="ga">Irish</option>
                                <option value="it">Italian</option>
                                <option value="ja">Japanese</option>
                                <option value="jw">Javanese</option>
                                <option value="kn">Kannada</option>
                                <option value="kk">Kazakh</option>
                                <option value="km">Khmer</option>
                                <option value="ko">Korean</option>
                                <option value="lo">Lao</option>
                                <option value="la">Latin</option>
                                <option value="lv">Latvian</option>
                                <option value="lt">Lithuanian</option>
                                <option value="mk">Macedonian</option>
                                <option value="mg">Malagasy</option>
                                <option value="ms">Malay</option>
                                <option value="ml">Malayalam</option>
                                <option value="mt">Maltese</option>
                                <option value="mi">Maori</option>
                                <option value="mr">Marathi</option>
                                <option value="mn">Mongolian</option>
                                <option value="my">Myanmar (Burmese)</option>
                                <option value="ne">Nepali</option>
                                <option value="no">Norwegian</option>
                                <option value="fa">Persian</option>
                                <option value="pl">Polish</option>
                                <option value="pt">Portuguese</option>
                                <option value="pa">Punjabi</option>
                                <option value="ro">Romanian</option>
                                <option value="ru">Russian</option>
                                <option value="sr">Serbian</option>
                                <option value="st">Sesotho</option>
                                <option value="si">Sinhala</option>
                                <option value="sk">Slovak</option>
                                <option value="sl">Slovenian</option>
                                <option value="so">Somali</option>
                                <option value="es">Spanish</option>
                                <option value="su">Sundanese</option>
                                <option value="sw">Swahili</option>
                                <option value="sv">Swedish</option>
                                <option value="tg">Tajik</option>
                                <option value="ta">Tamil</option>
                                <option value="te">Telugu</option>
                                <option value="th">Thai</option>
                                <option value="tr">Turkish</option>
                                <option value="uk">Ukrainian</option>
                                <option value="ur">Urdu</option>
                                <option value="uz">Uzbek</option>
                                <option value="vi">Vietnamese</option>
                                <option value="cy">Welsh</option>
                                <option value="yi">Yiddish</option>
                                <option value="yo">Yoruba</option>
                                <option value="zu">Zulu</option>
                            </select></td>
                        <td class="SL_td" width="3" align="center">
                            <div id="SL_switch_b" title="Switch languages"
                                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/switchb.png&quot;);"></div>
                        </td>
                        <td class="SL_td" width="20%" align="left"><select id="SL_lng_to"
                                                                           style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/select.png&quot;) 100% 0px no-repeat rgb(255, 255, 255);">
                                <option value="af">Afrikaans</option>
                                <option value="sq">Albanian</option>
                                <option value="ar">Arabic</option>
                                <option value="hy">Armenian</option>
                                <option value="az">Azerbaijani</option>
                                <option value="eu">Basque</option>
                                <option value="be">Belarusian</option>
                                <option value="bn">Bengali</option>
                                <option value="bs">Bosnian</option>
                                <option value="bg">Bulgarian</option>
                                <option value="ca">Catalan</option>
                                <option value="ceb">Cebuano</option>
                                <option value="ny">Chichewa</option>
                                <option value="zh-CN">Chinese (Simplified)</option>
                                <option value="zh-TW">Chinese (Traditional)</option>
                                <option value="hr">Croatian</option>
                                <option value="cs">Czech</option>
                                <option value="da">Danish</option>
                                <option value="nl">Dutch</option>
                                <option selected="selected" value="en">English</option>
                                <option value="eo">Esperanto</option>
                                <option value="et">Estonian</option>
                                <option value="tl">Filipino</option>
                                <option value="fi">Finnish</option>
                                <option value="fr">French</option>
                                <option value="gl">Galician</option>
                                <option value="ka">Georgian</option>
                                <option value="de">German</option>
                                <option value="el">Greek</option>
                                <option value="gu">Gujarati</option>
                                <option value="ht">Haitian Creole</option>
                                <option value="ha">Hausa</option>
                                <option value="iw">Hebrew</option>
                                <option value="hi">Hindi</option>
                                <option value="hmn">Hmong</option>
                                <option value="hu">Hungarian</option>
                                <option value="is">Icelandic</option>
                                <option value="ig">Igbo</option>
                                <option value="id">Indonesian</option>
                                <option value="ga">Irish</option>
                                <option value="it">Italian</option>
                                <option value="ja">Japanese</option>
                                <option value="jw">Javanese</option>
                                <option value="kn">Kannada</option>
                                <option value="kk">Kazakh</option>
                                <option value="km">Khmer</option>
                                <option value="ko">Korean</option>
                                <option value="lo">Lao</option>
                                <option value="la">Latin</option>
                                <option value="lv">Latvian</option>
                                <option value="lt">Lithuanian</option>
                                <option value="mk">Macedonian</option>
                                <option value="mg">Malagasy</option>
                                <option value="ms">Malay</option>
                                <option value="ml">Malayalam</option>
                                <option value="mt">Maltese</option>
                                <option value="mi">Maori</option>
                                <option value="mr">Marathi</option>
                                <option value="mn">Mongolian</option>
                                <option value="my">Myanmar (Burmese)</option>
                                <option value="ne">Nepali</option>
                                <option value="no">Norwegian</option>
                                <option value="fa">Persian</option>
                                <option value="pl">Polish</option>
                                <option value="pt">Portuguese</option>
                                <option value="pa">Punjabi</option>
                                <option value="ro">Romanian</option>
                                <option value="ru">Russian</option>
                                <option value="sr">Serbian</option>
                                <option value="st">Sesotho</option>
                                <option value="si">Sinhala</option>
                                <option value="sk">Slovak</option>
                                <option value="sl">Slovenian</option>
                                <option value="so">Somali</option>
                                <option value="es">Spanish</option>
                                <option value="su">Sundanese</option>
                                <option value="sw">Swahili</option>
                                <option value="sv">Swedish</option>
                                <option value="tg">Tajik</option>
                                <option value="ta">Tamil</option>
                                <option value="te">Telugu</option>
                                <option value="th">Thai</option>
                                <option value="tr">Turkish</option>
                                <option value="uk">Ukrainian</option>
                                <option value="ur">Urdu</option>
                                <option value="uz">Uzbek</option>
                                <option value="vi">Vietnamese</option>
                                <option value="cy">Welsh</option>
                                <option value="yi">Yiddish</option>
                                <option value="yo">Yoruba</option>
                                <option value="zu">Zulu</option>
                            </select></td>
                        <td class="SL_td" width="5%" align="center"></td>
                        <td class="SL_td" width="8%" align="center">
                            <div id="SL_TTS_voice" title="Listen to the translation"
                                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/ttsvoice.png&quot;);"></div>
                        </td>
                        <td class="SL_td" width="8%" align="center">
                            <div id="SL_copy" title="Copy translation" class="SL_copy"
                                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/copy.png&quot;);"></div>
                        </td>
                        <td class="SL_td" width="8%" align="center">
                            <div id="SL_bbl_font_patch"></div>
                            <div id="SL_bbl_font" title="Font size" class="SL_bbl_font"
                                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/font.png&quot;);"></div>
                        </td>
                        <td class="SL_td" width="8%" align="center">
                            <div id="SL_bbl_help" title="Help"
                                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/bhelp.png&quot;);"></div>
                        </td>
                        <td class="SL_td" width="15%" align="right">
                            <div id="SL_pin" class="SL_pin_off" title="Pin pop-up bubble"
                                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/pin-on.png&quot;);"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="SL_shadow_translation_result" style="visibility: visible;"></div>
        <div id="SL_loading" class="SL_loading"
             style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/loading.gif&quot;);"></div>
        <div id="SL_player2"></div>
        <div id="SL_alert100">Text-to-speech function is limited to 200 characters</div>
        <div id="SL_Balloon_options"
             style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/bg3.png&quot;) rgb(255, 255, 255);">
            <div id="SL_arrow_down"
                 style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/down.png&quot;);"></div>
            <table id="SL_tbl_opt" width="100%">
                <tr>
                    <td width="5%" align="center"><input id="SL_BBL_locer" type="checkbox" checked="1"
                                                         title="Show Translator's button 3 second(s)"></td>
                    <td width="5%" align="left">
                        <div id="SL_BBL_IMG" title="Show Translator's button 3 second(s)"
                             style="background: url(&quot;chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/img/util/bbl-logo.png&quot;);"></div>
                    </td>
                    <td width="70%" align="center"><a
                                href="chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/html/options/options.html?bbl"
                                target="_blank" class="SL_options" title="Show options">Options</a> : <a
                                href="chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/html/options/options.html?hist"
                                target="_blank" class="SL_options" title="Translation History">History</a> : <a
                                href="chrome-extension://noaijdpnepcgjemiklgfkcfbkokogabh/content/html/options/options.html?feed"
                                target="_blank" class="SL_options" title="ImTranslator Feedback">Feedback</a> : <a
                                href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=GD9D8CPW8HFA2"
                                target="_blank" class="SL_options" title="Make a small contribution">Donate</a></td>
                    <td width="15%" align="right"><span id="SL_Balloon_Close" title="Close">Close</span></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/holder.min.js"></script>


</html>