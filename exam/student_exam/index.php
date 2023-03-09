<html>
<?php
require_once('../login/configi.php');
session_start();
$studentId = $_SESSION['sid'];
$query = "SELECT questionbank.id,question_paper_mapping.question_papper_id,question,que_image,options,explanation  FROM `question_paper_mapping` 
INNER JOIN questionbank ON question_paper_mapping.question_papper_id = questionbank.question_papper_id
WHERE question_paper_mapping.student_id = $studentId AND question_paper_mapping.status = 0 AND questionbank.status = 1";
$result = $mysqli->query($query);
$alphas = range('A', 'Z');
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    unset($questionArray);
    if (isset($row['options']) && !empty($row['options'])) {
      $optionsArray = explode(",", $row['options']);
      $i = 0;
      foreach ($optionsArray as $key => $value) {
        $questionArray[] = $value;
        $i++;

      }
    } else {
      $questionArray = array();
    }


    $arr[] = array(
      'id' => $row['id'],
      'question_papper_id' => $row['question_papper_id'],
      'question' => $row['question'],
      'que_image' => $row['que_image'],
      'options' => $questionArray,
      'explanation' => $row['explanation'],

    );
  }

  

}
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Online Test</title>

  <link href="css/style.css" rel="stylesheet">
  <link href="css/cal.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="gate_st.css">
  <script type="text/javascript" src="validate.js"></script>
  <script type="text/javascript" src="cdtimer4.js"></script>
  <script type="text/javascript" src="lib/json2.js"></script>
  <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/cal.js"></script>
  <script type="text/javascript" src="lib/jqueryajax.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js">
  </script>
  <!-- <script type="text/javascript" src="lib/grunt.js"></script> -->
  <script type="text/javascript" src="lib/jqueryajax.js"></script>
  <script type="text/javascript" src="lib/jstorage.js"></script>
  <script type="text/javascript">
    var hour;
    var min;
    var sec;
    var tid = '4';
    var total = '<?php echo count($arr); ?>';
    var ssid = '7';
    var take = '2';

    var date = new Date();
    date.setTime(date.getTime() + (500 * 60 * 1000));

    hour = 0;
    min = 10;
    sec = 1;


    //--------DEFAULT---------       
    var txt = "";

    function typeIn(k) {
      if (k != "dot" && k != "minus" && k != "bksp") {
        var n = k.substring(2, k.length);
        txt = txt + n;
        $("#indiv").html(txt);
      } else {
        if ($("#indiv").html() != "|") {
          if (k == "bksp")
            txt = txt.substring(0, txt.length - 1);
          if (k == "dot")
            txt = txt + ".";
        } else {
          if (k == "minus") {
            txt = "-";
          }
        }

        $("#indiv").html(txt);
        if ($("#indiv").html() == "") {
          $("#indiv").html("|");
        }
      }
    }


    //Auto saving state after some interval
    $(document).ready(function () {
      $('#faadu_message').hide();
      $('#readylink').hide();

      $('#full_paper_bg').hide();
      $('#full_paper').hide();
      $('#inpBoxStore').hide();

      setInterval(function () {
        if ($.cookie(ssid + tid + "test") == 'progress') {
          $.cookie(ssid + tid + "hr", hour, {
            expires: date
          });
          $.cookie(ssid + tid + "min", min, {
            expires: date
          });
          $.cookie(ssid + tid + "sec", sec, {
            expires: date
          });


        }

      }, 5000);


    });

    // Preveventing Right Click
    var oLastBtn = 0;
    bIsMenu = false;
    //No RIGHT CLICK************************
    // ****************************
    if (window.Event)
      document.captureEvents(Event.MOUSEUP);

    function nocontextmenu() {
      event.cancelBubble = true
      event.returnValue = false;
      return false;
    }

    function norightclick(e) {
      if (window.Event) {
        if (e.which != 1)
          return false;
      } else
        if (event.button != 1) {
          event.cancelBubble = true
          event.returnValue = false;
          return false;
        }
    }
    document.oncontextmenu = nocontextmenu;
    document.onmousedown = norightclick;
    //**************************************
    // ****************************
    // Block backspace onKeyDown************
    // ***************************
    function onKeyDown() {
      if ((event.altKey) || ((event.keyCode == 8) &&
        (event.srcElement.type != "text" &&
          event.srcElement.type != "textarea" &&
          event.srcElement.type != "password")) ||
        ((event.ctrlKey) && ((event.keyCode == 78) || (event.keyCode == 82))) ||


        (event.keyCode == 116)) {
        event.keyCode = 0;
        event.returnValue = false;
      }
    }


    // Preveneting button
    document.onkeydown = function () {
      //alert(event.keyCode);

      switch (event.keyCode) {

        case 116: //F5 button
          event.returnValue = false;
          event.keyCode = 0;
          event.stopPropagation();
          return false;
        case 82: //R button
          if (event.ctrlKey) {
            event.returnValue = false;
            event.keyCode = 0;
            event.stopPropagation();
            return false;
          }
        case 8: //Backspace button
          event.returnValue = false;
          event.keyCode = 0;
          event.stopPropagation();
          return false;

      }

    }
  </script>
  <script type="text/javascript" src="testData7.js"></script>
  <script type="text/javascript" src="gate_sc.js"></script>
  <style type="text/css">
    html,
    body {
      height: 100%;
    }

    input[type=text] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid green;

      #inpBox table tr td {
        padding: 10px 20px;
        background-color: white;
      }

      #inpBox table tr td:hover {
        color: blue;
        cursor: pointer;
        background-color: lightgrey;
      }

      .timedesign {
        background: #49b04f;
        color: #fff;
        margin-bottom: 10px;
        text-align: center;
        padding: 7px 0px;
      }

      .timedesign h3 {
        margin-bottom: 0px;
      }
  </style>
</head>

<body>
  <h2 style="color:red;margin-bottom:0px" align="center"><noscript>For the proper Functionality, You must use Javascript
      enabled Browser.<br>Sorry for the Inconvenience..Please Try Again..</noscript></h2>

  <div id="container" style="display: block;">
    <div id="header">

      <div id="faadu_message"
        style="padding-top: 8px; margin-top: 0px; text-align: center; color: white; position: fixed; top: 0px; left: 0px; width: 100%; height: 42px; z-index: 999; background-color: green; font-weight: bold; font-size: 30px; display: none;">
      </div>
      <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td align="left" id="bannerImage">
              <div style="margin-top:10px;text-align:center;">

                <font size="4" color="#ffffff">
                  <b>

                    ONLINE TEST

                  </b>
                </font>


                <!--<span class="btn waves-effect waves-light btn-rounded btn-sm btn-success" data-toggle="modal" data-target="#cal" >Calculator</span>-->
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="width:100%;height: 100%;">

      <!-- CCFFFF--------------------Right Panel for Question List display------------------------ #fae6f6 -->
      <div
        style="background-color: rgb(228, 237, 247);float:right;width:25%;height:calc(100% - 45px);;overflow:auto;border-left: 3px solid #4d8cca;"
        id="lpanel">
        <div style="" class="timedesign">
          <h3>Timer:<span id="timer" class="timerclass"> 00:00:00</span></h3>
          <!-- <input type="hidden" value="00:07:44" name="timese" id="threeT"> -->
          <input type="hidden" value="00:07:44" name="timese" id="threeT">
        </div>
        <div style="height:345px;overflow:auto;padding-left:10px;">
          <table>
            <tbody>
              <?php

              for ($a = 1; $a <= count($arr); $a++) {
                $class = ($a == 1) ? 'not_answered' : 'not_visited'; ?>
                <?php
                if ($a <= 10) {
                  if ($a == 1) {
                    echo '<tr>';

                  }
                  ?>



                  <td>
                    <div id="<?php echo $a; ?>d" class="<?php echo $class; ?>" onclick="fetch_q3(<?php echo $a; ?>)"
                      style="cursor:pointer;"><?php echo $a; ?></div>
                  </td>


                  <?php if ($a == 10) {
                    echo '</tr>';

                  }
                } ?>

                <?php
                if ($a > 10 && $a <= 20) {
                  if ($a == 21) {
                    echo '<tr>';

                  }
                  ?>



                  <td>
                    <div id="<?php echo $a; ?>d" class="<?php echo $class; ?>" onclick="fetch_q3(<?php echo $a; ?>)"
                      style="cursor:pointer;"><?php echo $a; ?></div>
                  </td>


                  <?php if ($a == 20) {
                    echo '</tr>';

                  }
                } ?>


                <?php
                if ($a > 20 && $a <= 30) {
                  if ($a == 31) {
                    echo '<tr>';

                  }
                  ?>



                  <td>
                    <div id="<?php echo $a; ?>d" class="<?php echo $class; ?>" onclick="fetch_q3(<?php echo $a; ?>)"
                      style="cursor:pointer;"><?php echo $a; ?></div>
                  </td>


                  <?php if ($a == 30) {
                    echo '</tr>';

                  }
                } ?>

                <?php
                if ($a > 30 && $a <= 40) {
                  if ($a == 41) {
                    echo '<tr>';

                  }
                  ?>



                  <td>
                    <div id="<?php echo $a; ?>d" class="<?php echo $class; ?>" onclick="fetch_q3(<?php echo $a; ?>)"
                      style="cursor:pointer;"><?php echo $a; ?></div>
                  </td>


                  <?php if ($a == 40) {
                    echo '</tr>';

                  }
                } ?>

              <?php } ?>


            </tbody>
          </table>
        </div>
        <div style="position:relative;bottom:0px;">
          <p>
            <img src="images/legend.png">
          </p>
          <p style="margin-top:10px;border-top: 1px solid #4d8cca;padding-top:10px;">

            <input type="button" onclick="full_paper();" class="btn btn-primary"
              style="cursor: pointer; background:#5361cb; border-color:#5361cb; margin-left:10px"
              value="Question Paper">


            <input type="button" onclick="conf_fin();" class="btn btn-primary" style="cursor: pointer;" value="Submit">
          </p>

        </div>
      </div>

      <div class="tc" id="main_tc" style="width:75%; height:calc(100% - 127px)">
        <div style="border-bottom:1px solid #4d8cca; padding:5px;">


          <div style="color: #49b04f;font-size:14px;    font-weight: bold;">Question No. <span
              class="btn btn-primary btn-circle btn-sm" style="height:30px; width:30px; padding:4px 8px;"
              id="q_no">1</span></div>

        </div>

        <div>
          <!-- Question panel Starts -->
          <div id="qpanel" style="overflow:auto;height:100%;width:100%;">
            <?php $k = 1;
            foreach ($arr as $question) {
              if ($k == 2) {
                break;
              }
              ?>
              <div id="<?php echo $k; ?>qs">
                <form id="form-0" style="width:100%;">

                  <input type="hidden" value="<?php echo $_SESSION['sid']; ?>" name="stutid">
                  <input type="hidden" value="<?php echo $question['id']; ?>" name="testid">
                  <input type="hidden" value="<?php echo $question['question_papper_id']; ?>" name="quesid">
                  <input type="hidden" value="1" name="markes">

                  <p
                    style="text-align:left;font-size:100%;color:black;padding:20px 10px;background-color:#f5f9f4; font-family:Verdana,Arial; ">
                    <?php echo $question['question']; ?> </p>




                  <div>
                    <table border="0" width="100%" class="ntab">
                      <tbody>
                        <?php if (count($question['options']) > 1) { ?>
                          <?php foreach ($question['options'] as $key => $value) { ?>
                            <tr>
                              <td>
                                <?php echo $alphas[$key]; ?>. <input type="radio"
                                  id="<?php echo $k; ?>opt<?php echo strtolower($alphas[$key]); ?>" name="answer"
                                  value="<?php echo $alphas[$key]; ?>"
                                  onclick="answer_q(7,4,1,this.id); myFunctiona(this.value);"> <?php echo " " . $value; ?>
                              </td>
                            </tr>

                          <?php } ?>
                        <?php } else { ?>
                          <tr>
                            <td>
                              <label for="fname">Answer</label>
                              <input type="text" id="<?php echo $k; ?>opta" name="answer"
                                onchange="answer_q(7,4,1,this.id); myFunctiona(this.value);">
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div id="sample">

                  </div>




                </form>
              </div>

              <?php
              $k++;
            }
            ?>
            <tr>
              <td><input type="hidden" id="result" name="result"></td>
            </tr>
          </div>
          <!-- Question panel Ends -->


          <div style="border-top:1px solid #4d8cca;  padding:3px; text-align:center">



            <input type="button" onclick="review();" class="btn btn-primary"
              style="cursor: pointer;     background: #5361cb;border-color:5361cb" value="Mark for Review and Next">
            <input type="button" onclick="unmark();" class="btn btn-primary"
              style="cursor: pointer;     background: #ee0f0f; border-color:ee0f0f" value="Clear Response">
            <input type="button" onclick="myFunction(); save_next(); restartTimer(0,10,0,'threeT');"
              class="btn btn-primary" style="cursor: pointer;   " value="Save and Next">

          </div>
        </div>






      </div>
    </div>



  </div>

  <div id="msg_area" style="display: none;">
    <div id="pWait"
      style="background: black; height: 100%; width: 100%; z-index: 1999; position: absolute; opacity: 0.6; display: none;">
      <div style="top:45%;position:relative;color:white">
        <center><img src="images/loading.gif" style="height:50px;width:50px;display:block;"><br>
          <h2>Please wait</h2>
        </center>
      </div>
    </div>

    <div id="header">
      <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td align="left" id="bannerImage">
              <div style="margin-top:10px;text-align:center;">

                <font size="4" color="#ffffff">
                  <b>

                    ONLINE TEST

                  </b>
                </font>

              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="mainleft" style="">
      <div id="firstPage" style="overflow:auto;display:none;border:1px #CCC solid;padding:2px">
        <!--	<iframe src="genins.php" height="80%" width="99%" ></iframe>-->
      </div>
      <div id="secondPagep1" style="overflow:auto;border:1px #CCC solid;padding:2px;">
        <iframe src="csins.php" height="200" width="99%" style="border: 0;"></iframe>
      </div>
      <div id="instPagination" style="padding:10px;display:none;">
        <center><a id="instPaginationa" onclick="showNext()" alt="" class="btn btn-primary" style="cursor:pointer;">Next
            &gt;&gt;</a></center>
      </div>
      <div id="secondPagep2" style="text-align: center;">

        <!--	<span class="highlightText">
            <table><tr><td><input type="checkbox" id="disclaimer" onclick="linkdisp(this.id);"> </input></td>
            <td><span style="width:90%:float:left;color:red;font-weight:bold;">The computer provided to me is in proper working condition. I have read and understood the instructions given above.</span></td></tr></table>
          </span>--> <br> <br>
        <div class="form-check form-check-inline">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="disclaimer" onclick="linkdisp(this.id);">
            <label class="custom-control-label text-danger" for="disclaimer">Simulate Look of Real Exam</label>
          </div>
        </div>
        <br> <br>
        <center><span>
            <font size="5"><input type="button" class="btn btn-success" value="START TEST" id="readylink"
                onclick="startTest();" style="display: inline-block;"></font>
          </span></center>
        <br>
      </div>

    </div>
    <div id="footer">

      <div style="width:100%;padding-top:15px;">
        <center>
          <font color="white">

            Version : 1.1

          </font>
        </center>
      </div>

    </div>

  </div>



  <div id="quest_store" style="display: none;">
    <?php $k = 1;
    foreach ($arr as $question) {
      ?>
      <div id="<?php echo $k; ?>qs">
        <form id="form-0" style="width:100%;">

          <input type="hidden" value="<?php echo $_SESSION['sid']; ?>" name="stutid">
          <input type="hidden" value="<?php echo $question['id']; ?>" name="testid">
          <input type="hidden" value="<?php echo $question['question_papper_id']; ?>" name="quesid">
          <input type="hidden" value="1" name="markes">

          <p
            style="text-align:left;font-size:100%;color:black;padding:20px 10px;background-color:#f5f9f4; font-family:Verdana,Arial; ">
            <?php echo $question['question']; ?> </p>




          <div>
            <table border="0" width="100%" class="ntab">
              <tbody>
                <?php if (count($question['options']) > 1) { ?>
                  <?php foreach ($question['options'] as $key => $value) { ?>
                    <tr>
                      <td>
                        <?php echo $alphas[$key]; ?>. <input type="radio"
                          id="<?php echo $k; ?>opt<?php echo strtolower($alphas[$key]); ?>" name="answer"
                          value="<?php echo $alphas[$key]; ?>" onclick="answer_q(7,4,1,this.id); myFunctiona(this.value);">
                        <?php echo " " . $value; ?>
                      </td>
                    </tr>

                  <?php } ?>
                <?php } else { ?>
                  <tr>
                    <td>
                      <label for="fname">Answer</label>
                      <input type="text" id="<?php echo $k; ?>opta" name="answer"
                        onchange="answer_q(7,4,1,this.id); myFunctiona(this.value);">
                    </td>
                  </tr>
                <?php } ?>
                <tr>
                  <td><input type="hidden" id="result" name="result"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="sample">

          </div>




        </form>
      </div>

      <?php
      $k++;
    }
    ?>




































    <div id="full_paper_retrieve">
      <h1
        style="text-align:center; color:white; background-color:black;margin-bottom: 0;    text-transform: uppercase;">
        Full Paper Preview</h1>

      <?php $p = 1;
      foreach ($arr as $resultss) { ?>
        <div>
          <table border="0" class="ntab" width="100%">
            <tbody>
              <tr>
                <td style="padding:0px">
                  <p style="text-align:left;font-size:100%;color:#fff;padding:20px 10px;background-color:#2cabe3; "> Q
                    <?php echo $p; ?>.
                    <?php echo $resultss['question']; ?>
                  </p>
                </td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <?php foreach ($question['options'] as $key => $value) { ?>
                <tr>
                  <td>
                    <?php echo $alphas[$key]; ?>.
                    <?php echo " " . $value; ?>
                  </td>
                </tr>

              <?php } ?>
              <tr>
                <td>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php
        $p++;
      } ?>






    </div>
    <form action="" method="" id="ansForm"><input type="text" name="qAns_re" value="4"><input type="text" name="sid"
        value="7"><input type="text" name="1anss" value=""><input type="text" name="2anss" value=""><input type="text"
        name="3anss" value=""><input type="text" name="4anss" value=""><input type="text" name="5anss" value=""><input
        type="text" name="6anss" value=""><input type="text" name="7anss" value=""><input type="text" name="8anss"
        value=""><input type="text" name="9anss" value=""><input type="text" name="10anss" value=""></form>
  </div>

  <div id="full_paper_bg"
    style="position: fixed; z-index: 990; inset: 0px; background-color: black; opacity: 0.8; display: none;">
    <div style="float:right; "> <img src="./images/close.jpg" style="opacity:1;width:50px;height:50px;"
        onclick="full_paper_hide();"></div>
  </div>
  <div id="full_paper"
    style="position: fixed; inset: 0px 5%; height: 100%; background-color: white; overflow: auto; opacity: 1; z-index: 999; display: none;">


  </div>
  <div id="inpBoxStore" style="display: none;">
    <div id="inpBox" style="width:15%;height:50%;background-color:grey;border:1px solid black;">
      <div id="indiv"
        style="width:95%;height:14%;background-color:white;margin-top:1%;margin-left:1%;padding:1%;font-weight:bold;">|
      </div>
      <table>
        <tbody>
          <tr>
            <td id="di1" onclick="typeIn(this.id);">1</td>
            <td id="di2" onclick="typeIn(this.id);">2</td>
            <td id="di3" onclick="typeIn(this.id);">3</td>
          </tr>
          <tr>
            <td id="di4" onclick="typeIn(this.id);">4</td>
            <td id="di5" onclick="typeIn(this.id);">5</td>
            <td id="di6" onclick="typeIn(this.id);">6</td>
          </tr>
          <tr>
            <td id="di7" onclick="typeIn(this.id);">7</td>
            <td id="di8" onclick="typeIn(this.id);">8</td>
            <td id="di9" onclick="typeIn(this.id);">9</td>
          </tr>
          <tr>
            <td id="dot" onclick="typeIn(this.id);"><strong>.</strong></td>
            <td id="di0" onclick="typeIn(this.id);">0</td>
            <td id="minus" onclick="typeIn(this.id);"><strong>-</strong></td>
          </tr>
          <tr>
            <td colspan="3" id="bksp" onclick="typeIn(this.id);">Backspace</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>




  <script>
    function full_paper() {
      $('#full_paper_bg').fadeIn(400);
      $('#full_paper').slideDown(400);
      $('#full_paper').html($('#full_paper_retrieve').html());

    }

    function full_paper_hide() {
      $('#full_paper_bg').fadeOut(300);
      $('#full_paper').slideUp(400);

    }

    function showNext() {
      $('#firstPage').hide();
      $('#secondPagep1').show();

      $('#instPaginationa').attr("onclick", "showPrev()");
      $('#secondPagep2').show();
    }

    function showPrev() {


      $('#instPaginationa').html("Next >>");
      $('#instPaginationa').attr("onclick", "showNext()");
      $('#secondPagep2').hide();
    }

    function linkdisp(k) {
      if ($('#' + k).is(':checked'))
        $('#readylink').show();
      else
        $('#readylink').hide();
    }
  </script>
  <script type="text/javascript">
    function myFunctiona(answer) {
      $('#result').val(answer);
      document.getElementById("result").value = answer;
    }

    function myFunction() {
      var stdid = document.getElementsByName("stutid")[0].value;
      var testid = document.getElementsByName("testid")[0].value;
      var qnid = document.getElementsByName("quesid")[0].value;
      var marks = document.getElementsByName("markes")[0].value;
      var stdanswer = document.getElementsByName("result")[0].value;
      var spendtime = document.getElementsByName("timese")[0].value;
      if (stdanswer == '') {
        stdanswer = $('#result').val();
      }
      //var answerstd = document.getElementById("indiv").innerHTML;
      // alert(stdanswer);
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'stdent=' + stdid + '&test=' + testid + '&question=' + qnid + '&mark=' + marks + '&answer=' +
        stdanswer + '&spendt=' + spendtime;
      if (stdid == '' || testid == '' || qnid == '' || marks == '' || stdanswer == '' || spendtime == '') {
        //alert("Please Fill All Fields");
      } else {
        // AJAX code to submit form.
        $.ajax({
          type: "POST",
          url: "ajaxjs.php",
          data: dataString,
          cache: false,
          success: function (html) {
            //alert(html);
          }
        });
      }
      return false;
    }
  </script>
  <script type="text/javascript">
    var timers1 = {};

    function countDown1(hrs, min1, sec1, gid) {
      sec1--;
      if (sec1 == -01) {
        sec1 = 59;
        min1 = min1 - 1;
      } else {
        min1 = min1;
      }
      if (min1 == -01) {
        min1 = 59;
        hrs = hrs - 1;
      } else {
        hrs = hrs;
      }
      if (sec1 <= 9) {
        sec1 = "0" + sec1;
      }
      if (hrs <= 9) {
        hrs = "0" + hrs;
      }
      time = hrs + ":" + (min1 <= 9 ? "0" + min1 : min1) + ":" + sec1 + "";
      if (document.getElementById) {
        document.getElementById(gid).value = time;
        document.getElementById('timer').innerHTML = time; // timer will run in timer area
      }
      timers1[gid] = window.setTimeout("countDown1(" + hrs + "," + min1 + "," + sec1 + ",'" + gid + "');", 1000);
      if (hrs == '00' && min1 == '00' && sec1 == '00') {
        sec1 = "00";
        window.clearTimeout(timers1[gid]);
        testOver();
      }

    }

    function addLoadEvent(func) {
      var oldonload = window.onload;
      if (typeof window.onload != 'function') {
        window.onload = func;
      } else {
        window.onload = function () {
          if (oldonload) {
            oldonload();
          }
          func();
        }
      }
    }

    addLoadEvent(function () {
      //countDown1(0,0,4,'threeT'); // for testing purpose
      countDown1(0, 10, 0, 'threeT');

    });

    function restartTimer(hrs, min1, sec1, gid) {
      window.clearTimeout(timers1[gid]);
      timers1[gid] = countDown1(hrs, min1, sec1, gid);
    }
  </script>
  <iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe>
  <div id="GOOGLE_INPUT_CHEXT_FLAG" input=""
    input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}"
    style="display: none;"></div>

</body>

</html>