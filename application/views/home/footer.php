 
 <div class="row">
 
  <div class="hr">
 
 <strong style="color: white; font-size: 18px; line-height: 62px; margin: 0 auto;">Cần giúp đỡ? Hãy gọi cho bộ phận hỗ trợ của chúng tôi qua hotline: 0125-875-9999 - 085-875-9999 </strong>
 
 </div>
 </div>

 <div style="background:#035c8a; min-height: 100px; color: white;" id="footer">
 <div class="row ">
 <div class="footer_bg">

 <?php

foreach ($this->db->get('tbl_noidung')->result() as $con) {

    $content[$con->ma] = $con->detail;
}

$content = (object) $content;

?>
 
 <div class="col-md-3" style="padding-left: 30px;"><?php echo @$content->lienhe ?></div>
  <div class="col-md-3" style="padding-left: 15px;"><?php echo @$content->lienket ?></div>
   <div class="col-md-3">
   
  
   
   <?php echo @$content->hotro ?>
 
   
   </div>
   </div>
 </div>
 
 </div>
 <div class="row">
 <div style="background: #02334c;min-height: 50px; line-height: 40px;color: white; padding-left: 20px;"><p class="copyright-text">©  2017 STV. All right reserved. Designed with by <a href="#">STVInc, JSC Company</a></p></div>
</div>
 </div>

    </div><!-- /.container -->
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    
    
    <script type='text/javascript' src='/assets/js/jquery.marquee.min.js'></script>
    
    <script>
    
    $(document).ready(function(){
$('.marquee').marquee();
    })
    </script>
    
    
    <script>var appCode_live_chat_support = "6y2k6i9omu41nm5fr6bn0qezabq3w0re";var t = "https:";var url_live_chat_support = "//static.fpt.ai/livechat/src";(function() {var r = document.createElement("script");r.src = t + url_live_chat_support + "/script-chat-box.js";var c = document.getElementsByTagName("body")[0];c.appendChild(r);})()</script>
    <style>
    
    
   body { 
    background: url('/assets/style/bg1.png') left top no-repeat fixed,
    url('/assets/style/bg2.png') right top no-repeat fixed,
        url('/assets/style/bg3.png') left bottom no-repeat fixed,
            url('/assets/style/bg4.png') right bottom no-repeat fixed !important;
            background-attachment: fixed;
    
}
    .marquee {
  width: 100%;
  overflow: hidden;

}

.ver {
  height: 600px;
  width: 100%;
}


    #footer .col-md-3
    {
        padding: 10px;
    }
    body
    {
        background: #f0f0f0;
    }
    .container {
   background: white;
 
}
.panel-success {
    border-color: #e2e2e2;
border-radius: 0;
}

    #contact li
    {
         list-style: none;
         border-bottom: 1px dotted #eee;
         padding: 10px;
         color: white;
         font-size: 14px;
    }
    .glyphicon-bookmark
    {
        color: red;
    }
    .glyphicon
    {
        color: gold;
    }
    
    .panel-success>.panel-heading {
    color: #3c763d;

    background: transparent url('/assets/style/menubg.png');
    border-color: #32456f;
}
.navbar-default {
    background-color: #d51e29;
    border-color: #a94442;
border-radius: 0;
}
.panel-title
{
    color: white;
}
    
    .navbar-default {
    background-color: #1053ae;
    border-color: #1053ae;
}
.navbar-default .navbar-nav>li>a {
    color: #fff;
    text-transform: uppercase;
}
.sell
{
    background-color: #d51e29 !important;
}
.glyphicon-star
{
    color: gold;
}
.btn-success {
    color: #fff;
    background-color: #09489e;
    border-color: #031733;
}

.table .td, .table .th
{
    font-size: 12px;
}
::-webkit-scrollbar-button{ display: block; height: 13px; border-radius: 0px; background-color: #fff; } 
::-webkit-scrollbar-button:hover{ background-color: #fff; }
 ::-webkit-scrollbar-thumb{ background-color: #127bb6; border-radius: 5px; }
  ::-webkit-scrollbar-thumb:hover{ background-color: #0080ff; } 
  ::-webkit-scrollbar-track{ background-color: #fff; } 
  ::-webkit-scrollbar-track:hover{ background-color: #CCC; }
   ::-webkit-scrollbar{ width: 12px; }
   
  </style>
     </body>
</html>