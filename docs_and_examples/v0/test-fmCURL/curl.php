<?php
// *********************************************************************************************************************************
//
// curl.php
//
// *********************************************************************************************************************************
//
// Copyright (c) 2017 - 2018 Mark DeNyse
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.
//
// *********************************************************************************************************************************

require_once 'startup.inc.php';

$html = '';

$curl = new fmCURL();

$curlResult = $curl->curl('https://www.example.com');

if (! $curl->getIsError($curlResult)) {
   $html = $curlResult;
}
else {
   $errorInfo = $curl->getErrorInfo($curlResult);
   fmLogger('Error = '. $errorInfo['code'] .' Message = '. $errorInfo['message']);
}

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>fmPDA &#9829;</title>
      <link href="../../css/normalize.css" rel="stylesheet" />
      <link href="../../css/styles.css" rel="stylesheet" />
      <link href="../../css/fontawesome-all.min.css" rel="stylesheet" />
      <link href="../../css/prism.css" rel="stylesheet" />
      <script src="../../js/prism.js"></script>
   </head>
   <body>

      <!-- Always on top: Position Fixed-->
      <header>
         fmPDA <span class="fmPDA-heart"><i class="fas fa-heart"></i></span>
         <span style="float: right;">Version <strong>0</strong> (FileMaker Server 16)</span>
      </header>



      <!-- Fixed size after header-->
      <div class="content">

         <!-- Always on top. Fixed position, fixed width, relative to content width-->
         <div class="navigation-left">
            <div class="navigation-header1"><a href="../../index.php">Home</a></div>
            <br>

            <?php echo GetNavigationMenu(1); ?>
         </div>



          <!-- Scrollable div with main content -->
         <div class="main">

            <div class="main-header">
               fmCURL::curl()
            </div>
            <div class="main-header main-sub-header-1">
               Get the contents of www.example.com<br>
               <pre><code class="language-php">$curlResult = $curl->curl('https://www.example.com');</code></pre>
            </div>


            <pre><?php echo htmlspecialchars($html); ?></pre>


            <!-- Display the debug log -->
            <?php echo fmGetLog(); ?>

         </div>

      </div>



      <!-- Always at the end of the page -->
      <footer>
         <a href="http://www.driftwoodinteractive.com"><img src="../../img/di.png" height="32" width="128" alt="Driftwood Interactive" style="vertical-align:text-bottom"></a><br>
         Copyright &copy; <?php echo date('Y'); ?> Mark DeNyse Released Under the MIT License.
      </footer>

		<script src="../../js/main.js"></script>
      <script>
         javascript:ExpandDropDown("fmCURL");
      </script>

   </body>
</html>
