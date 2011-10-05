<?php

include "admin/include/session.php";

require_once('CountryFromIP.inc.php');

include("flag.cls.php") ;

// initialize the class FLAG
$flag = new FLAG() ;

//$ip =$_SERVER['REMOTE_ADDR'];
//$ip ='86.96.226.87';
$ip = '65.49.2.27';
$date = date("Y.m.d");

$object = new CountryFromIP();

$countryName =  $object->GetCountryName($ip);
$flagPath =  $object->ReturnFlagPath();

if ($countryName == "") 
	{ 
		$country_id = file_get_contents('http://api.hostip.info/country.php?ip='.$ip);
		$country_name = $flag->GetCountryNameById($country_id);
		if ($country != "XX") 
		{
			mysql_query("INSERT INTO tracked_data (id, ip, date, country) VALUES (NULL, '$ip', '$date', '$country_name')") or die(mysql_error());	
		}
		//echo "You don't have a global IP.";
	}
else 
	{ 
		mysql_query("INSERT INTO tracked_data (id, ip, date, country) VALUES (NULL, '$ip', '$date', '$countryName')") or die(mysql_error());
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><link href="thankyou_files/goog.css" rel="stylesheet" type="text/css"> <link href="thankyou_files/dlpage.css" rel="stylesheet" type="text/css"> <link href="thankyou_files/dlpage-rtl.css" rel="stylesheet" type="text/css">  <link rel="icon" type="image/ico" href="http://www.google.com/tools/dlpage/res/chrome/images/chrome-16.png"> <title>Google Chrome لنظام التشغيل Windows - شكرًا لك على التنزيل</title> <script type="text/javascript" src="thankyou_files/gu-util.js">
  
</script> <script type="text/javascript">
  function resetButtons(name) {
    var buttons = document.getElementsByName(name);
    for (i = 0; i < buttons.length; ++i) {
      buttons[i].disabled = false;
    }
  }
  function showThrobber(isVisible) {
    var divThrobber = document.getElementById('throbber');
    var imgThrobber = document.getElementById('throbber-img');
    if (!divThrobber || !imgThrobber) {
      return;
    }
    if (!isVisible) {
      divThrobber.style.display = 'none';
    }
    
    imgThrobber.src = isVisible ?
      
        "chrome_throbber_fast_16.gif"
      
        : "";
    if (isVisible) {
      divThrobber.style.display = 'inline';
    }
  }
  function getThankyouUrl(queryString) {
    var thankYouUrl = "thankyou.html?hl\x3dar\x26oneclickinstalled\x3d";
    if (areStatsEnabled()) {
      if (queryString.length > 0) {
        queryString += '&';
      }
      queryString += 'statcb=';
    }
    if (queryString.length == 0) {
      return thankYouUrl;
    }
    if (thankYouUrl.indexOf('?') == -1) {
      thankYouUrl += '?';
    } else if (thankYouUrl.charAt(thankYouUrl.length - 1) != '&' &&
               thankYouUrl.charAt(thankYouUrl.length - 1) != '?') {
      thankYouUrl += '&';
    }

    thankYouUrl += queryString;
    return thankYouUrl;
  }
  function queueThankyou(timeout, queryString) {
    var page = getThankyouUrl(queryString);
    setTimeout(function() {showThrobber(false);
                           resetButtons("submitbutton");
                           this.document.location.href = page}, timeout);}
  function getApps() {
    var apps = new Array();
    
    
    
    
      apps.push(_GU_createAppInfo(
          "{8A69D345-D564-463C-AFF1-A69D9E530F96}",
          "Google Chrome",
          "false",
          ""));
    
    
    
    
    return apps;
  }
  function areStatsEnabled() {
    var statcb = document.getElementById("statcb");
    return (statcb && statcb.checked);
  }
  function isDownloadTaggingEnabled() {
    
    return true;
  }
  function downloadInstaller(statEnable, opt_buildDownloadPath, opt_filePath) {
    var defaultDownloadPath = isDownloadTaggingEnabled() ?
        _GU_buildDlPath : _GU_buildDlPathNoTag;
    var buildDownloadPath = opt_buildDownloadPath || defaultDownloadPath;
    var filePath = opt_filePath ||
      
        "/update2/installers/ChromeSetup.exe";
      

     
      var dlServer =
      
        "http://dl.google.com";
      
    location.href =
        buildDownloadPath(getApps(),
                          "ar",
                          statEnable,
                          dlServer,
                          filePath);
     
  }
  function installViaDownload() {
    queueThankyou(1200, '');
    downloadInstaller(areStatsEnabled());
  }
  function isClickOnceEnabled() {
    
    return true;
  }
  function isOneClickEnabled() {
    return true;
  }
  function installViaClickOnce() {
  
    showThrobber(true);
    
    queueThankyou(10000, 'clickonceinstalled=');
    
    downloadInstaller(areStatsEnabled(), _GU_buildClickOncePath, "/update2/installers/clickonce/GoogleInstaller_ar.application");
  
  }
  function installViaOneClick() {
  
    showThrobber(true);
    window.google.update.oneclick.install(
      getApps(),
      "ar",
      areStatsEnabled(),
      function() {queueThankyou(4000, 'oneclickinstalled=');},
      function(hr) {installViaDownload();});
  
  }
  function installApp() {
    if (isOneClickEnabled() && _GU_isOneClickAvailable()) {
      installViaOneClick();
    } else if (isClickOnceEnabled() && _GU_isClickOnceAvailable()) {
      installViaClickOnce();
    } else {
      installViaDownload();
    }
  }
</script> <script type="text/javascript">
  var pageTracker;  
  var installMethod;
  function doSubmit() {
    var hasStatcb =
    
      false;
    
    
    setTimeout(function() {downloadInstaller(hasStatcb);}, 100);
    if (pageTracker && installMethod) {    
      pageTracker._trackPageview("/ty/retry_" + installMethod);
    }
  }
</script></head><body onload="_GU_OnloadBody('thankyou');"><div id="container"> <div id="header"><a href="index.htm"><img class="logo" alt="" src="thankyou_files/logo_sm.jpg"></a> <h1>&nbsp;</h1></div> <div id="main"><h2><img class="inline" src="thankyou_files/chrome-205_noshadow.png" alt=""> شكرًا على تجريب Google Chrome!</h2>   <p></p> <strong>ستكتمل أداة مثبّت Google Chrome في ثوانٍ وسيتم بدء تشغيل المتصفح الجديد تلقائيًا.</strong> <p></p><p style="margin-left: 4em;">إذا واجهتك مشاكل في التحميل، <a id="resubmit" href="javascript:doSubmit();">انقر هنا.</a></p>      <p class="links">
        <script type="text/javascript">utmx_section("Learn More Link")</script>
        <a href="features.html">تعرف على Google Chrome »</a> </p>
 </div> <div id="footer"><p>©2009 Google - <a href="http://www.google.com/">الصفحة الرئيسية</a> <!-- - <a href="http://www.google.com/intl/ar/about.html">معلومات عن Google</a> - <a href="http://www.google.com/chrome/intl/ar/privacy.html?hl=ar&amp;oneclickinstalled=">سياسة الخصوصية</a> - <a href="http://www.google.com/support/chrome/?hl=ar">مساعدة</a> --> </p></div></div> 
<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1053965053;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "ccg4CP-QThD99cj2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript>
<img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1053965053/?label=ccg4CP-QThD99cj2Aw&amp;script=0"/>
</noscript>

<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1053964783;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "eyRdCNmRThDv88j2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript><img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1053964783/?label=eyRdCNmRThDv88j2Aw&amp;script=0"/>
</noscript>

<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1052826178;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "2EgJCKb8RBDCtIP2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript><img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1052826178/?label=2EgJCKb8RBDCtIP2Aw&amp;script=0"/>
</noscript>

<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1052825908;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "3fY3CID9RBC0soP2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript><img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1052825908/?label=3fY3CID9RBC0soP2Aw&amp;script=0"/>
</noscript>

<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1052825818;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "jdqrCNr9RBDasYP2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript><img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1052825818/?label=jdqrCNr9RBDasYP2Aw&amp;script=0"/>
</noscript>

<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1052825728;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "Y0s1CLT-RBCAsYP2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript><img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1052825728/?label=Y0s1CLT-RBCAsYP2Aw&amp;script=0"/>
</noscript>

<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = 1052825638;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "f7npCI7_RBCmsIP2Aw";
//-->
</script>
<script language="JavaScript" src="thankyou_files/conversion.js">
</script>
<noscript><img height="1" width="1" border="0"
src="http://www.googleadservices.com/pagead/conversion/1052825638/?label=f7npCI7_RBCmsIP2Aw&amp;script=0"/>
</noscript>
 <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ?
      "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost +
      "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script><script src="thankyou_files/ga.js" type="text/javascript"></script> <script type="text/javascript">
  var path = "/chrome";
  
    var pageTracker = _gat._getTracker("UA-4436568-1");
    if (path) {
      pageTracker._setCookiePath(path);
    }
    pageTracker._trackPageview();
  
  
  </script> <script type="text/javascript">
    
      var installMethod = "oneclick";
    
    if (pageTracker) pageTracker._trackPageview("/ty/install_" + installMethod);
  </script></body></html>