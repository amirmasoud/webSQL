<!DOCTYPE html>
<html lang="en-US"><head>
<meta http-equiv="Content-Type" content="text/html">
<meta charset="UTF-8">
<title>SQL</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">


<script src="js/w3Database.js" charset="utf-8"></script>


</head>

<body>
	<div class="row main-container center">
		<div class="col-md-9">
	
			<div class="row code">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">SQL</div>
						<div class="panel-body">
						<div id="contentSQL">
							<form action="#" method="post" target="view" id="tryitform" name="tryitform" onsubmit="validateForm();">
								<div class="form-group">
									<p>SQL Command:</p>
								</div>

								<textarea id="textareaCodeSQL" class="form-control" rows="3"><?php if( isset($_GET['query'])){$query = str_replace('_', ' ', $_GET['query']);echo $query;}else{echo "SELECT * FROM customers";} ?></textarea>
								<input type="hidden" name="code" id="code">
								<input type="hidden" id="bt" name="bt">
							</form>
							<p><input class="btn btn-success runsql" type="button" value="اجرای SQL »" onclick="w3schoolsSQLSubmit()"></p>
						</div>
						</div>
					</div>
				</div>
			</div>			

			<div class="row result">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><p>Result:</p></div>
						<div class="panel-body">
							<div id="resultSQL">
								<iframe id="iframeResultSQL" frameborder="0" name="view" style="display: none;"></iframe>
								<div id="divResultSQL"><div><div>Record Count: </div><table class="table table-striped"></table></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 database">

		<h3><b>DB:</b></h3>
		<div>
			<div id="yourDB"><table width="100%" class="table"><tbody><tr><th style="text-align:left;">Table name</th><th style="text-align:right;">Records</th></tr><tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Customers&quot;)">Customers</td><td style="text-align:right;">91</td></tr><tr><td title="Click to see the content of the Categories table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Categories&quot;)">Categories</td><td style="text-align:right;">8</td></tr><tr><td title="Click to see the content of the Employees table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Employees&quot;)">Employees</td><td style="text-align:right;">10</td></tr><tr><td title="Click to see the content of the OrderDetails table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;OrderDetails&quot;)">OrderDetails</td><td style="text-align:right;">518</td></tr><tr><td title="Click to see the content of the Orders table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Orders&quot;)">Orders</td><td style="text-align:right;">196</td></tr><tr><td title="Click to see the content of the Products table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Products&quot;)">Products</td><td style="text-align:right;">77</td></tr><tr><td title="Click to see the content of the Shippers table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Shippers&quot;)">Shippers</td><td style="text-align:right;">3</td></tr><tr><td title="Click to see the content of the Suppliers table" style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsWebSQL1.selectStar(&quot;Suppliers&quot;)">Suppliers</td><td style="text-align:right;">29</td></tr></tbody></table></div>
			<div id="yourRC"></div>
			<div id="yourIX"></div>
			<p><button class="btn btn-default" title="بازگردانی اطلاعات اولیه پایگاه داده" id="restoreDBBtn" type="button" onclick="w3schoolsWebSQL1.w3ClearDatabase()">Restore Database</button></p>
		</div>

	<div id="dbInfo">
		<div id="descriptionDIV">

		</div>

		</div>
	</div>	

<input type="hidden" id="sSupport" value="">
<script type="text/javascript">
var w3schoolsWebSQLOK = !!window.openDatabase;
var statementSupport = document.getElementById("sSupport").value;
if (w3schoolsWebSQLOK === true && statementSupport === "") {
	w3schoolsWebSQL1 = new w3WebSQLInit();
} else {
	var ifr = document.getElementById("iframeResultSQL");
	var idoc = (ifr.contentWindow || ifr.contentDocument);
	if (idoc.document) idoc=idoc.document;
	idoc.write("<div style='margin:10px;font-family:verdana;font-size:12px;'>Click on <b>'Run SQL'</b>.</div>");
}

function showDescription() {
	document.getElementById("descriptionDIV").style.display = "block";
}

function hideDescription() {
	document.getElementById("descriptionDIV").style.display = "none";
}

function w3schoolsSQLSubmit() {
	var txt;
	if (w3schoolsWebSQLOK === true && statementSupport === "") {
		w3schoolsWebSQL1.runSQL();
	} else {
		var t=document.getElementById("textareaCodeSQL").value;
		t=t.replace(/=/gi,"w3equalsign");
		w3schoolsNoWebSQLSubmit();
	}
}

function w3schoolsWriteDBInfo() {
	var txt;
	if (w3schoolsWebSQLOK === true && statementSupport === "") {
		document.getElementById("iframeResultSQL").style.display="none";
		document.getElementById("divResultSQL").style.display="block";
		document.getElementById("restoreDBBtn").style.display="inline";
		document.getElementById("nobrowsersupport").style.display="none";
		document.getElementById("nostatementsupport").style.display="none";		
		document.getElementById("yesbrowsersupport").style.display="block";
		w3schoolsWebSQL1.myDatabase();
	} else {
		if (w3schoolsWebSQLOK === true && statementSupport === "-1") {
			document.getElementById("nostatementsupport").style.display="block";
			document.getElementById("nobrowsersupport").style.display="none";
			document.getElementById("yesbrowsersupport").style.display="none";
			document.getElementById("yesbrowsersupport2").style.display="none";
			document.getElementById("websqlexplain").style.display="none";			
			document.getElementById("descriptionDIV").style.display = "block";
		} else {
			document.getElementById("nobrowsersupport").style.display="block";
			document.getElementById("nostatementsupport").style.display="none";
			document.getElementById("yesbrowsersupport").style.display="none";
			document.getElementById("yesbrowsersupport2").style.display="none";
		}
		document.getElementById("divResultSQL").style.display="none";
		document.getElementById("iframeResultSQL").style.display="inline";
		txt = '';
		txt = txt + '<table width="100%" cclass="reference notranslate">';
		txt = txt + '<tr><th style="text-align:left;">Tablenames</th><th style="text-align:right;">Records</th></tr>';
		txt = txt + '<tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Customers\')">Customers</td>';
		txt = txt + '<td style="text-align:right;">91</td>';
		txt = txt + '</tr><tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Categories\')">Categories</td>';
		txt = txt + '<td style="text-align:right;">8</td>';
		txt = txt + '</tr><tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Employees\')">Employees</td>';
		txt = txt + '<td style="text-align:right;">10</td></tr>';
		txt = txt + '<tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'OrderDetails\')">OrderDetails</td>';
		txt = txt + '<td style="text-align:right;">518</td></tr>';
		txt = txt + '<tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Orders\')">Orders</td>';
		txt = txt + '<td style="text-align:right;">196</td></tr>';
		txt = txt + '<tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Products\')">Products</td>';
		txt = txt + '<td style="text-align:right;">77</td></tr>';
		txt = txt + '<tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Shippers\')">Shippers</td>';
		txt = txt + '<td style="text-align:right;">3</td></tr>';
		txt = txt + '<tr><td style="text-align:left;cursor:pointer;text-decoration:underline;" onclick="w3schoolsNoWebSQLSelectStar(\'Suppliers\')">Suppliers</td>';
		txt = txt + '<td style="text-align:right;">29</td></tr>';
		txt = txt + '</table>';
		document.getElementById("yourDB").innerHTML = txt;
	}
}

function w3schoolsNoWebSQLSelectStar(x) {
	var sql = "SELECT * FROM " + x + ";";
	document.getElementById("textareaCodeSQL").value = sql;
	w3schoolsNoWebSQLSubmit();
}

function w3schoolsNoWebSQLSubmit() {
	var t = document.getElementById("textareaCodeSQL").value;
	document.getElementById("code").value = t;
	
	t=escape(t);document.getElementById("bt").value="1";
		
	document.getElementById("tryitform").action="trysql_view.asp?x=" + Math.random();
	validateForm();
	document.getElementById("tryitform").submit();
}

function validateForm() {
	var code=document.getElementById("code").value;
	if (code.length>5000) {
		document.getElementById("code").value="<h1>Error</h1>";
	}
}

w3schoolsWriteDBInfo();

</script>


</body>
</html>