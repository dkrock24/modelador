<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Factura - Diseñador</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="moment.min.js"></script>
	
	<script>
		$(document).ready(function(){

			// Mostrar contenido en Vista Previa
			$("#template_html").keyup(function(){
				$('.html').html($(this).val());
				//$('.source_code').html($(this).val());
			});

			var entityMap = {
			  '&': '&amp;',
			  '<': '&lt;',
			  '>': '&gt;',
			  '"': '&quot;',
			  "'": '&#39;',
			  '/': '&#x2F;',
			  '`': '&#x60;',
			  '=': '&#x3D;'
			};

			function escapeHtml (string) {
			  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
			  	alert(entityMap[s]);
			    return entityMap[s];
			  });
			}

			$(".control").click(function(){
				var accion = $(this).attr("name");
				var method = $(this).attr("id");

				switch(accion){

					case 'html': html_element(method);break;
					case 'table': table_element(method);break;
					case 'php': php_element(method);break;
					case 'style': style_element(method);break;
					case 'delete': delete_element();break;
					
				}
			});

			function html_element(method){
				var html_form 
	    		if(method == 'div'){
	    			html_form = "<div> </div>";
	    		}else if(method == 'p'){
	    			html_form = "<p> </p>";
	    		}
	    		else if(method == 'label'){
	    			html_form = "<label> </label>";
	    		}
	    		dibujar(html_form);
			}

	    	function dibujar(elemento){

		        var txt = jQuery("#template_html");
		        
		        var caretPos = txt[0].selectionStart;
		        var textAreaTxt = txt.val();
		        var txtToAdd = elemento;
		        txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
		        $('.html').html( txt.val() );
		        $('.template_php').text( txt.val() );
	    	}

	    	function table_element2(){
	    		var filas = prompt("Filas ?");
                var columnas = prompt("columnas ?");
                var html="";
                html +="<table class='table' onmousedown='mydragg.startMoving(this,'"+"'container'"+"',event);' onmouseup='mydragg.stopMoving('"+"'container'"+"');'>";
                for(x=0; x<filas; x++){
                    html += "<tr>";
                    for(b=0; b<columnas; b++){
                        html += "<td>"+b+"</td>";
                    }
                    html += "</tr>";
                }
                html +="</table>";
	    		dibujar(html);
	    	}

	    	function table_element(method){
	    		var html_form 
	    		if(method == 'table2'){
	    			table_element2();
	    		}else{
	    			
	    			var  x = method.substring(method.length - 1);
	    			if(x =='='){
	    				var y = prompt(method + " ?");
	    				html_form = method +"'"+y+"'" ;
	    			}else{
	    				html_form = method;
	    			}
	    			
	    			dibujar(html_form);
	    		}	    		
	    	}

	    	function php_element(method){
	    		var html_form="";
	    		if(method == 'foreach'){
	    			html_form = "<\?php $items = [1,2,3,4,5]; foreach($items as $val){ echo $val; } ?>";
	    		}
	    		if(method == 'date'){
	    			html_form = "<\?php echo date('Y-m-d'); ?>";
	    		}	    		
	    		dibujar(html_form);
	    	}

	    	function style_element(method){
	    		var x = prompt(method + " ?");
	    		if(method=="style"){
	    			var html_form = method+'=" "'+x;
	    		}else{
	    			var html_form = method+x;
	    		}
	    		dibujar(html_form);
	    	}

	    	function delete_element(){
				var editor = document.getElementById("template_html");
				var editorHTML = editor.innerHTML;
            	var selectionStart = 0, selectionEnd = 0;

				  	if (editor.selectionStart) selectionStart = editor.selectionStart;
		            if (editor.selectionEnd) selectionEnd = editor.selectionEnd;
		            if (selectionStart != selectionEnd) {
		                var editorCharArray = editorHTML.split("");
		                editorCharArray.splice(selectionEnd, 0, "</b>");
		                editorCharArray.splice(selectionStart, 0, "<b>"); //must do End first
		                editorHTML = editorCharArray.join("");
		                editor.innerHTML = editorHTML;
		            }
		            var x = editor.value.substring(selectionStart,selectionEnd);
		            console.log(x);
		           $('#template_html').html( x );
			}
	    	
		});

		$(document).ready(function() {
		    var interval = setInterval(function() {
		        var momentNow = moment();
		        $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
		                            + momentNow.format('dddd')
		                             .substring(0,3).toUpperCase());
		        $('#time-part').html(momentNow.format('A hh:mm:ss'));
		    }, 100);
		});

	</script>

<style type="text/css">
        h1.page-header {
    margin-top: -5px;
}

.sidebar {
    padding-left: 0;
}

.main-container { 
    background: #FFF;
    padding-top: 15px;
    margin-top: -20px;
}

.footer {
    width: 100%;
}  

#template_html{
  caret-color:red;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				IBS
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://www.pingpong-labs.com" target="_blank">Date <span id="date-part"></span> <span id="time-part"></span></a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked collapse navbar-collapse navbar-ex1-collapse">
				<li class="active"><a href="#">Home</a></li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#form"><i class="fa fa-fw fa-search"></i> HTML <i class="fa fa-fw fa-angle-down pull-right"></i></a>
					<ul id="form" class="collapse">
                        <li><a href="#" id="div" name="html" class="control"><i class="fa fa-angle-double-right"></i>Div</a></li>
                        <li><a href="#" id="p" name="html" class="control"><i class="fa fa-angle-double-right"></i>P</a></li>
                        <li><a href="#" id="label" name="html" class="control"><i class="fa fa-angle-double-right"></i>Label</a></li>
                    </ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#table"><i class="fa fa-fw fa-search"></i>TABLE<i class="fa fa-fw fa-angle-down pull-right"></i></a>
					<ul id="table" class="collapse">
						<li><a href="#" id="table2" 	 name="table" class="control"><i class="fa fa-angle-double-right"></i> Super Table</a></li>
                        <li><a href="#" id="<table></table>" 	 name="table" class="control"><i class="fa fa-angle-double-right"></i> Table</a></li>
                        <li><a href="#" id="<tr></tr>" 	 name="table" class="control"><i class="fa fa-angle-double-right"></i> Tr</a></li>
                        <li><a href="#" id="<td></td>" 	 name="table" class="control"><i class="fa fa-angle-double-right"></i> Td</a></li>
                        <li><a href="#" id="colspan=" name="table" class="control"><i class="fa fa-angle-double-right"></i> Colspan</a></li>
                        <li><a href="#" id="celspan=" name="table"><i class="fa fa-angle-double-right"></i> Celspan</a></li>
                        <li><a href="#" id="border=" name="table" class="control"><i class="fa fa-angle-double-right"></i> Border</a></li>
                    </ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#Styles"><i class="fa fa-fw fa-search"></i>STYLE<i class="fa fa-fw fa-angle-down pull-right"></i></a>
					<ul id="Styles" class="collapse">
                        <li><a href="#" id="color" name="style" class="control"><i class="fa fa-angle-double-right"></i> Color</a></li>
                        <li><a href="#" id="style" name="style" class="control"><i class="fa fa-angle-double-right"></i> Style</a></li>                        
                        <li><a href="#" id="height" name="style" class="control"><i class="fa fa-angle-double-right"></i> Height</a></li>
                        <li><a href="#" id="width" name="style" class="control"><i class="fa fa-angle-double-right"></i> Width</a></li>
                        <li><a href="#" id="padding" name="style" class="control"><i class="fa fa-angle-double-right"></i> Padding</a></li>
                        <li><a href="#" id="margin" name="style" class="control"><i class="fa fa-angle-double-right"></i> Margin</a></li>
                        <li><a href="#" id="bgcolor" name="style" class="control"><i class="fa fa-angle-double-right"></i> Bgcolor</a></li>
                        <li><a href="#" id="background" name="style" class="control"><i class="fa fa-angle-double-right"></i> Background</a></li>
                    </ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#PHP"><i class="fa fa-fw fa-search"></i>PHP<i class="fa fa-fw fa-angle-down pull-right"></i></a>
					<ul id="PHP" class="collapse">
                        <li><a href="#" id="date" name="php" class="control"><i class="fa fa-angle-double-right"></i> Date</a></li>
                        <li><a href="#" id="subtotal" name="php" class="control"><i class="fa fa-angle-double-right"></i> Sub Total</a></li>
                        <li><a href="#" id="total" name="php" class="control"><i class="fa fa-angle-double-right"></i> Total</a></li>
                        <li><a href="#" id="foreach" name="php" class="control"><i class="fa fa-angle-double-right"></i> Foreach</a></li>
                    </ul>
				</li>
				<li>
					<li id="delete" class="control"><a href="#"><i class="fa fa-angle-double-right"></i> Delete</a></li>
				</li>
			</ul>
		</div>
		<div class="col-md-10 content" style="height: 100%">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modelador
                </div>
                <form action="save" method="post">
                <div class="panel-body"><br>
                    <div class="container-fluid main-container">
			
						<div class="col-md-6 content">
								<div class="panel panel-default">
									<?php
										$data = [1,2,3,4,5];
									?>
									<div class="panel-heading">
										EDITOR
									</div>
									<div class="panel-body">
										<textarea name="" id="template_html" cols="30" rows="10" class="form-control"></textarea>
									</div>
								</div>
						</div>
						<div class="col-md-6 content">
								<div class="panel panel-default">
									<div class="panel-heading">
										PREVIEW
									</div>
									<div class="panel-body">
										<span class="html" style="width:100%; height:100px; "></span>
									</div>
								</div>
						</div>
					</div>
					<div class="container-fluid main-container">
						<hr>
						<div class="col-md-6 content">
							<div class="panel panel-default">
								<div class="panel-heading">
										OPTIONS
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-6">Lineas <input type="text" name="items" value="" class="form-control"></div>
											<div class="col-md-6">Lineas <input type="text" name="items" value="" class="form-control"></div>
											<div class="col-md-6">Lineas <input type="text" name="items" value="" class="form-control"></div>
											<div class="col-md-6">Lineas <input type="text" name="items" value="" class="form-control"></div>
											<div class="col-md-6">Lineas <input type="text" name="items" value="" class="form-control"></div>
											<div class="col-md-6">Lineas <input type="text" name="items" value="" class="form-control"></div>
										</div>

									</div>
							</div>
						</div>
						<div class="col-md-6 content">
							<div class="panel panel-default">
								<div class="panel-heading">
										SOURCE CODE
									</div>
									<div class="panel-body">
										<span class="template_php" name="template_php" id="template_php" style="width:100%; height:100px; "></span>
									</div>
							</div>
						</div>

					</div>
                </div>
                </form>
            </div>


		</div>
		<footer class="pull-left footer" style="bottom: 0px;">
			<p class="col-md-12">
				<hr class="divider">
				Copyright &COPY; 2019 <a href="http://www.pingpong-labs.com">IBS</a>
			</p>
		</footer>
	</div>
<script type="text/javascript">

</script>
</body>
</html>
