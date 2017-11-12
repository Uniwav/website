<?php include 'lang/common.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Uniwav - Real Time Weather</title>
    <meta name="description" content="Weather Project INSA Centre Val de Loire." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">

    <link rel="icon" type="image/png" href="img/favicon.png" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/css/materialize.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/custom.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js"></script>
    <script src="js/scripts.js"></script>

    <script src="assets/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="assets/amcharts/serial.js" type="text/javascript"></script>

  </head>
  <body onload="javascript:setTimeout('location.reload(true)',300000)" >

   <div class="navbar-fixed">

			<ul id="lang_select" class="dropdown-content">
			  <li><a href="?lang=fr">Français</a></li>
			  <li><a href="?lang=en">English</a></li>
        <li><a href="?lang=es">Español</a></li>
        <li><a href="?lang=it">Italiano</a></li>
        <li><a href="?lang=de">Deutsch</a></li>
			</ul>

      <nav class="light-blue darken-3">
    <div class="nav-wrapper">
      <a href="#!" style="margin-left: 10px;" class="brand-logo"><img alt="Uniwav" height="63" src="img/uniwav.png"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="modal-trigger" href="#modal1"><?php echo $lang['MENU_ABOUT_US']; ?></a></li>
        <li><a href="/mindmap">MindMap</a></li>
        <li><a href="."><i class="mdi-navigation-refresh"></i></a></li>
		<li><a class="dropdown-button" href="#!" data-activates="lang_select"><i class="mdi-navigation-more-vert"></i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="."><i class="mdi-navigation-refresh right"></i><?php echo $lang['MENU_REFRESH']; ?></a></li>
        <hr>
        <li><a href="/mindmap">MindMap</a></li>
        <hr>
        <hr>
        <li><a href="?lang=fr">Français</a></li>
        <li><a href="?lang=en">English</a></li>
        <li><a href="?lang=es">Español</a></li>
        <li><a href="?lang=it">Italiano</a></li>
        <li><a href="?lang=de">Deutsch</a></li>
        <hr>
        <hr>
        <li><a target="_blank" href="https://horlogeskynet.github.io/">Samuel Forestier</a></li>
        <li><a target="_blank" href="https://pixelswap.fr/">Corentin Mors</a></li>
      </ul>
    </div>
  </nav>
    </div>

    <div class="parallax-container" style="height: 300px;">
    <div class="parallax"><img src="img/ville_de_blois1.jpg"></div>
  </div>
  <div class="section white">
    <div class="row container">
      <h2 class="header"><?php echo $lang['PAGE_NOW']; ?></h2>
      
         
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image">
              <img src="https://4.bp.blogspot.com/-7abrcXPi47Q/UABYMaBfITI/AAAAAAAAJqY/qrX5hnXbHDo/s640/Screen+shot+2012-07-13+at+18.08.47.png">
              <?php
                    $file = "data/data.txt";
                    $data = file_get_contents($file);

                    $rows = explode("\n", $data);

                        //get data

                        $last = current(array_slice($rows, -1));
                        $last = str_replace("  ", " ", $last);
                        $row_data = explode(' ', $last);

                        $info[$row]['date']           = $row_data[0];
                        $info[$row]['heure']         = $row_data[1];
                        $info[$row]['temperature']  = $row_data[2];
                        $info[$row]['humidite']       = $row_data[3];
                        $info[$row]['pression']       = $row_data[4];
                        $info[$row]['luminosite']       = $row_data[5];


          echo   ' <span class="card-title">'. $info[$row]['temperature'] .'°C '. $lang['DESC_IN_AD'] . 'Blois</span>
            </div>
            <div class="card-content">
              <p>';

                        //display data
                        echo $lang['DESC_WE_ARE'] . $info[$row]['date'] . '.' . $lang['DESC_ITS'] . $info[$row]['heure'] . $lang['DESC_NOW'] . $info[$row]['temperature'] . ' °C ' . $lang['DESC_HUMIDITY'] . $info[$row]['humidite'] . ' %.<br>';
                        echo $lang['DESC_PRESSURE'] . $info[$row]['pression'] . ' hPa' . $lang['DESC_LUM'] . $info[$row]['luminosite'] . ' / 22. <br />';
						
						//echo "The time is " . date("h:i:sa");

						if ($info[$row]['date'] == date("d/m/Y") ){
							if( (date("His")-10000) < (str_replace(":", "", $info[$row]['heure'])) ){
							echo $lang['ENABLED'];}
							else {
								echo $lang['LAST_MEASURES'];
							}
						}
						else {
							echo $lang['DISABLED'];
						}
              ?>
              </p>
            </div>
          </div>
        </div>
      
      <div class="col s12 m6">

        <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Blois%2C_vu_de_la_rive_gauche_%28rive_sud%29_de_la_Loire.jpg/1200px-Blois%2C_vu_de_la_rive_gauche_%28rive_sud%29_de_la_Loire.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $lang['BLOIS_TITLE']; ?> <i class="mdi-navigation-more-vert right"></i></span>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Blois <i class="mdi-navigation-close right"></i></span>
          <p><?php echo $lang['BLOIS_DESC']; ?></p>
        </div>
      </div>
          
      </div>
            
      <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title"><?php echo $lang['PROJ_TITLE']; ?></span>
              <p><?php echo $lang['PROJ_DESC']; ?></p>
            </div>
            <div class="card-action">
              <a target="_blank" href="/data"><?php echo $lang['PROJ_DATA']; ?></a>
              <a target="_blank" href="https://github.com/Uniwav"><?php echo $lang['PROJ_CODE']; ?></a>
            </div>
          </div>
        </div>

        <div class="col s12 m6">
        <a href="app/Uniwav.apk" target="_blank"><img style="max-width: 100%; width: 300px;" src="img/playstore.gif"></a>
        <a href="app/Uniwav.xap" target="_blank"><img style="max-width: 100%; width: 300px;" src="img/windowstore.png"></a>
        </div>

        <br clear="all"><br><br>
      
        <h2 class="header"><?php echo $lang['PAGE_HOURS']; ?></h2>

    <div class="col s12">


    <div id="chartdiv" style="width: 100%; height: 600px;"></div>

 <script type="text/javascript">
           var chart;
           var chartData = [];

           AmCharts.ready(function () {

               // SERIAL CHART
               chart = new AmCharts.AmSerialChart();
               chart.pathToImages = "assets/amcharts/amcharts/images/";
               chart.dataProvider = chartData;
               chart.categoryField = "date";
               chart.dataDateFormat = "DD/MM/YYYY/JJ:NN:SS";

               // listen for "dataUpdated" event (fired when chart is inited) and call zoomChart method when it happens
               chart.addListener("dataUpdated", zoomChart);

               // AXES
               // category
               var categoryAxis = chart.categoryAxis;
               categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
               categoryAxis.minPeriod = "ss"; // our data is daily, so we set minPeriod to DD
               categoryAxis.minorGridEnabled = true;
               categoryAxis.axisColor = "#DADADA";
               categoryAxis.twoLineMode = true;
               categoryAxis.dateFormats = [{
                    period: 'fff',
                    format: 'JJ:NN:SS'
                }, {
                    period: 'ss',
                    format: 'JJ:NN:SS'
                }, {
                    period: 'mm',
                    format: 'JJ:NN'
                }, {
                    period: 'hh',
                    format: 'JJ:NN'
                }, {
                    period: 'DD',
                    format: 'DD'
                }, {
                    period: 'WW',
                    format: 'DD'
                }, {
                    period: 'MM',
                    format: 'MMM'
                }, {
                    period: 'YYYY',
                    format: 'YYYY'
                }];

               // first value axis (on the left)
               var valueAxis1 = new AmCharts.ValueAxis();
               valueAxis1.position = "left";
               valueAxis1.axisColor = "#5ca36a"; //Vert
               valueAxis1.gridAlpha = 0;
               valueAxis1.axisThickness = 2;
               chart.addValueAxis(valueAxis1);

               // second value axis (on the right)
               var valueAxis2 = new AmCharts.ValueAxis();
               valueAxis2.position = "right";
               valueAxis2.axisColor = "#509ddd"; //Bleu
               valueAxis2.gridAlpha = 0;
               valueAxis2.axisThickness = 2;
               chart.addValueAxis(valueAxis2);

               // third value axis (on the left, detached)
               var valueAxis3 = new AmCharts.ValueAxis();
               valueAxis3.position = "left";
               valueAxis3.offset = 65;
               valueAxis3.axisColor = "#e65d1f"; //Orange
               valueAxis3.gridAlpha = 0;
               valueAxis3.axisThickness = 2;
               chart.addValueAxis(valueAxis3);

               // fourth value axis (on the right, detached)
               var valueAxis4 = new AmCharts.ValueAxis();
               valueAxis4.position = "right";
               valueAxis4.offset = 65;
               valueAxis4.axisColor = "#ffd00a"; //Jaune
               valueAxis4.gridAlpha = 0;
               valueAxis4.axisThickness = 2;
               chart.addValueAxis(valueAxis4);

               // GRAPHS
               // first graph
               var graph1 = new AmCharts.AmGraph();
               graph1.lineColor = valueAxis1.axisColor;
               graph1.valueField = "temperature";
               graph1.title = "<?php echo $lang['PAGE_TEMPERATURE']; ?>";
               graph1.bullet = "round";
               graph1.hideBulletsCount = 30;
               graph1.bulletBorderThickness = 1;
               chart.addGraph(graph1);

               // second graph
               var graph2 = new AmCharts.AmGraph();
               graph2.lineColor = valueAxis2.axisColor;
               graph2.valueAxis = valueAxis2;
               graph2.valueField = "humidity";
               graph2.title = "<?php echo $lang['PAGE_HUMIDITY']; ?>";
               graph2.bullet = "square";
               graph2.hideBulletsCount = 30;
               graph2.bulletBorderThickness = 1;
               chart.addGraph(graph2);

               // third graph
               var graph3 = new AmCharts.AmGraph();
               graph3.lineColor = valueAxis3.axisColor;
               graph3.valueAxis = valueAxis3;
               graph3.title = "<?php echo $lang['PAGE_PRESSURE']; ?>";
               graph3.valueField = "pression";
               graph3.bullet = "triangleUp";
               graph3.hideBulletsCount = 30;
               graph3.bulletBorderThickness = 1;
               chart.addGraph(graph3);

               // fourth graph
               var graph4 = new AmCharts.AmGraph();
               graph4.lineColor = valueAxis4.axisColor;
               graph4.valueAxis = valueAxis4;
               graph4.valueField = "luminosity";
               graph4.title = "<?php echo $lang['PAGE_LUX']; ?>";
               graph4.bullet = "triangleDown";
               graph4.hideBulletsCount = 30;
               graph4.bulletBorderThickness = 1;
               chart.addGraph(graph4);

               // CURSOR
               var chartCursor = new AmCharts.ChartCursor();
               chartCursor.cursorAlpha = 0.1;
               chartCursor.fullWidth = true;
               chart.addChartCursor(chartCursor);

               // SCROLLBAR
               var chartScrollbar = new AmCharts.ChartScrollbar();
               chart.addChartScrollbar(chartScrollbar);

               // LEGEND
               var legend = new AmCharts.AmLegend();
               legend.marginLeft = 110;
               legend.useGraphSettings = true;
               chart.addLegend(legend);

               // WRITE
               chart.write("chartdiv");

               // get data
               loadCSV("data/data.txt");

           });

			//Get Data from .txt
			function loadCSV(file) {
			    var request;
			    if (window.XMLHttpRequest) {
			        // IE7+, Firefox, Chrome, Opera, Safari
			        request = new XMLHttpRequest();
			    } else {
			        // code for IE6, IE5
			        request = new ActiveXObject('Microsoft.XMLHTTP');
			    }
			    // load
			    request.open('GET', file, false);
			    request.send();
			    parseCSV(request.responseText);
			}

			//Parse Data
			function parseCSV(data){
				//replace doubles spaces by single
				data = data.replace( /  +/g, ' ' );
				//replace UNIX new lines
				data = data.replace (/\r\n/g, "\n");
				//replace MAC new lines
				data = data.replace (/\r/g, "\n");
				//split into rows
				var rows = data.split("\n");
			    // alert(data); // to test the data parsing

			    // Loop the content and parse it
			    // loop through all rows
				for (var i = 0; i < rows.length; i++) {
				    // this line helps to skip empty rows
				    if (rows[i]) {
				        // our columns are separated by space
				        var column = rows[i].split(" ");

				        // column is array now 
				        // first item is date
				        var date = column[0] + "/" + column[1];
				        // second item is time
				        var time = column[1];

				        var temperature = column[2];
				        var humidity = column[3];
				        var pression = column[4];
				        var luminosity = column[5];

				        // create object which contains all these items:
				        var dataObject = {
				            date: date,
				            time: time,
				            temperature: temperature,
				            humidity: humidity,
				            pression: pression,
				            luminosity: luminosity,
				        };
				        // add object to chartData array
				        chartData.push(dataObject);
				    }
				}
				chart.validateData();
			}
           

           // this method is called when chart is first inited as we listen for "dataUpdated" event
           function zoomChart() {
               // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
               chart.zoomToIndexes(chartData.length - 20, chartData.length - 1);
           }
        </script>

        </div>
        </div>  
		</div>  

  <div class="parallax-container">
    <div class="parallax"><img src="https://upload.wikimedia.org/wikipedia/commons/7/77/Blois_30.jpg"></div>
  </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4><?php echo $lang['MENU_ABOUT_US']; ?></h4>
      <p><?php echo $lang['ABOUT']; ?></p>
    </div>
    <div class="modal-footer">
      <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
    </div>
  </div>
  
  <footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Uniwav</h5>
                <p class="grey-text text-lighten-4">INSA Centre Val de Loire Project by 1A Students</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text"><?php echo $lang['PAGE_MADE']; ?></h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="https://horlogeskynet.github.io/">Samuel Forestier</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="https://pixelswap.fr/">Corentin Mors</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2015 Uniwav
            <a class="grey-text text-lighten-4 right" target="_blank" href="http://www.insa-centrevaldeloire.fr/">INSA Centre Val de Loire</a>
        </div>
    </div>
  </footer>
 
  </body>
</html>
