<?php

//connect to the database 
include 'conn.php';
//start the XML output 
print "<chart>";
print"<chart_type>bar</chart_type>
<chart_pref rotation_x='0' rotation_y='30' />
<axis_ticks value_ticks='false' category_ticks='true' />
<series_color>
<color>21B042</color>
		<color>5132C1</color>
		<color>F74373</color>
	</series_color>
<chart_transition type='slide_down' delay='0' duration='3' order='series' />
<legend transition='slide_left' delay='2' duration='1' size='9' bullet='circle'/>
<chart_guide horizontal='false'
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
                />";
print "<chart_data>";

//output the first row that contains the years 
print "<row>";
print "<null/>";
$category = mysql_query ("SELECT year FROM details ORDER BY year");
for ( $column=0; $column < mysql_num_rows($category); $column++ ) 
{
	print "<string>".mysql_result ( $category, $column, "Year")."</string>";
}
print "</row>";

//output row 2 to 4. Each row contains a region name and its data 

	print"<row>";
	print"<string> Movement Of Gross NPAs</string>";
	$data = mysql_query ("SELECT movement_of_gross_npas FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "movement_of_gross_npas")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Movement Of Provision For NPAs</string>";
	$data = mysql_query ("SELECT movement_of_provision_for_npas FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "movement_of_provision_for_npas")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Movement Of Net NPAs</string>";
	$data = mysql_query ("SELECT movement_of_net_npas FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "movement_of_net_npas")."</number>";
	}
	print "</row>";
	
	

//finish the XML output 
print "</chart_data>";
print "</chart>";

?>
 