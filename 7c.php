<?php

//connect to the database 
include 'conn.php';

//start the XML output 
print "<chart>";
print"<chart_type>line</chart_type>
<legend transition='slide_left' delay='2' duration='1' size='9' bullet='line'/>

	<axis_ticks value_ticks='false' category_ticks='true' />
	<chart_transition type='slide_down' delay='0' duration='3' order='series' />
	<chart_pref line_thickness='5'/>
	<series_color>
		
		<color>F74373</color>
		
		<color>21B042</color>
		<color>5132C1</color>
		
	</series_color>
	
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
	print"<string> Total Provisions Held</string>";
	$data = mysql_query ("SELECT total_provisions_held FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "total_provisions_held")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Net NPAs to Net Advanced</string>";
	$data = mysql_query ("SELECT net_npas_to_net_advanced FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "net_npas_to_net_advanced")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Provisioning Coverage Ratio</string>";
	$data = mysql_query ("SELECT provisioning_coverage_ratio FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "provisioning_coverage_ratio")."</number>";
	}
	print "</row>";
	
	

//finish the XML output 
print "</chart_data>";
print "</chart>";

?>
 