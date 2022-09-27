<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exercice 3</title>
<meta name="keywords" content="global, contact page, css templates, website templates, CSS, HTML" />
<meta name="description" content="Global Contact Form - free CSS template provided by templatemo.com" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/editor.css" rel="stylesheet" type="text/css" />
<script src="js/simpleajax.js"></script>
<script src="js/ajax.js"></script>
</head>
<body> 

<div id="templatemo_wrapper">

	<div id="templatemo_header">
    
        <div id="templatemo_menu">
        
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="contact.php" class="current">Contact</a></li>
            </ul>    	
        
        </div> <!-- end of templatemo_menu -->
        
        <div id="site_title">
        
            <h1><a href="#" target="_parent">Global <strong>Web</strong><span>CSS Templates</span></a></h1>
            
        </div> <!-- end of site_title -->
    
    </div> <!-- end of templatemo_header -->
    
    <div id="templatemo_main">
    
    	<div id="templatemo_content">
        
            <h2>Contact Us</h2>
<!-- **DYNAMIC CONTENT -->						
<p class="editable" data-id="1111">
<?php
	$fichier = fopen("database/1111.txt","r");
	fpassthru($fichier);
?>	
</p>
<!-- DYNAMIC CONTENT** -->
            
        <div class="cleaner_h40"></div>
        
        	<div class="two_column_ws float_l">
        		<h6>Company Address One</h6>
<!-- **DYNAMIC CONTENT -->						
<p class="editable" data-id="1112">
<?php
	$fichier = fopen("database/1112.txt","r");
	fpassthru($fichier);
?>	
</p>
<!-- DYNAMIC CONTENT** -->

            </div>
                
            <div class="two_column_ws float_r">
           
                <h6>Company Address Two</h6>
<!-- **DYNAMIC CONTENT -->						
<p class="editable" data-id="1113">
<?php
	$fichier = fopen("database/1113.txt","r");
	fpassthru($fichier);
?>	
</p>
<!-- DYNAMIC CONTENT** -->
                
            </div>
        
        
            <div class="cleaner_h50"></div>
            
            	<div id="contact_form">
            
                    <h4>Quick Contact</h4>
                
                    <form method="post" name="contact" action="#">
                    
                        <input type="hidden" name="post" value="Send" />
                        <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                        <div class="cleaner_h10"></div>
                        
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner_h10"></div>
                        
                        <label for="phone">Phone:</label> <input type="text" name="phone" id="phone" class="input_field" />
                        <div class="cleaner_h10"></div>
                        
                        <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner_h10"></div>
                        
                        <input type="submit" class="submit_btn" name="submit" id="submit" value="Send" />
                        <input type="reset" class="submit_btn" name="reset" id="reset" value="Reset" />
                    
                    </form>

            </div> 
        
        </div> <!-- end of content -->
        
        <div id="templatemo_sidebar">
        
        	<h2>Latest Updates</h2>
            
            <div class="news_box">
				<div class="date">October 28, 2015</div>
                <p><a href="#">Suspendisse sed odio ut mi auctor blandit</a></p>
<!-- **DYNAMIC CONTENT -->						
<p class="editable" data-id="1114">
<?php
	$fichier = fopen("database/1114.txt","r");
	fpassthru($fichier);
?>	
</p>
<!-- DYNAMIC CONTENT** -->
                
            </div>
            
            <div class="news_box">
				<div class="date">October 26, 2015</div>
                <p><a href="#">Donec massa nisl, consequat eu</a></p>
                
<!-- **DYNAMIC CONTENT -->						
<p class="editable" data-id="1115">
<?php
	$fichier = fopen("database/1115.txt","r");
	fpassthru($fichier);
?>	
</p>
<!-- DYNAMIC CONTENT** -->
                
          </div>
            
            <div class="news_box">
                <div class="date">October 22, 2015</div>
                <p><a href="#">Curabitur vitae enim risus, at placerat turpis</a></p>
<p class="editable" data-id="1116">
<?php
	$fichier = fopen("database/1116.txt","r");
	fpassthru($fichier);
?>	
</p>
<!-- DYNAMIC CONTENT** -->
                
          </div>
            
            <div class="cleaner_h40"></div>

        </div>
        
        <div class="cleaner"></div>
        
    
    </div> <!-- end of templatemo_main -->
    
     <div id="templatemo_footer">

        Copyright © 2015 <a href="#">Your Company Name</a> | 
        <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">CSS Templates</a>
    
    </div> <!-- end of templatemo_footer -->

</div>  <!-- end of templatemo_wrapper -->

<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>