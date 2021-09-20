<?php

//connect to the database 
include 'conn.php';
$brn=$_GET['branch'];

//start the XML output 
print "<chart>";
print"<chart_type>column</chart_type>";
print"<chart_transition type='zoom' delay='.5' duration='5' order='series' />
<chart_pref line_thickness='5'/>
 <chart_guide horizontal='true'
                vertical='true'
                thickness='1' 
                color='ff4400' 
                alpha='75' 
                type='dashed' 
                
                 
                radius='8'
                fill_alpha='0'
                line_color='ff4400'
                line_alpha='75'
                line_thickness='4'
             
                size='10'
                text_color='ffffff'
                background_color='ff4400'
                text_h_alpha='90'
                text_v_alpha='90' 
                />

   <!-- use chart_label in combination with chart_guide -->
   <chart_label position='outside' />";
print"<legend transition='slide_left' delay='2' duration='1' size='12' bullet='circle'/>";


print "<chart_data>";

//output the first row that contains the years 
print "<row>";
print "<null/>";
$category = mysql_query ("SELECT year FROM branchwise where branch='$brn' ORDER BY year");
for ( $column=0; $column < mysql_num_rows($category); $column++ ) 
{
	print "<string>".mysql_result ( $category, $column, "Year")."</string>";
}
print "</row>";

//output row 2 to 4. Each row contains a region name and its data 

	
	print"<row>";
	print"<string>Business Per Employee</string>";
	$data = mysql_query ("SELECT business_per_employee FROM branchwise  where branch='$brn' ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "business_per_employee")."'>".mysql_result ( $data, $column, "business_per_employee")."</number>";
		
	}
	print "</row>";
	
	

//finish the XML output 
print "</chart_data>";
print "
<series_color>
		
		<color>6A0888</color>
	</series_color>
	<series bar_gap='50' set_gap='30' />";
print "</chart>";

?>
 