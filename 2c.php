<?php

//connect to the database 
include 'conn.php';

//start the XML output 
print "<chart>";
print"<chart_type>stacked bar</chart_type>";
print "<chart_transition type='slide_right' delay='0' duration='3' order='category' />";
print"<legend transition='slide_down' delay='5' duration='1' size='9' align='left'/>

	<axis_ticks value_ticks='false' category_ticks='true' />
	
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
                />
				<series_color>
		
		<color>61283C</color>
		
		<color>21B042</color>
		<color>5132C1</color>
		<color>F74373</color>
	</series_color>";
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
	print"<string> Core Deposits</string>";
	$data = mysql_query ("SELECT core_deposits FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "core_deposits")."'>".mysql_result ( $data, $column, "core_deposits")."</number>";
	}
	print "</row>";
	
	print"<row>";
	print"<string> Term Deposits from Banks</string>";
	$data = mysql_query ("SELECT term_deposits FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "term_deposits")."'>".mysql_result ( $data, $column, "term_deposits")."</number>";
	}
	print "</row>";
	
	print"<row>";
	print"<string> Gross Advances</string>";
	$data = mysql_query ("SELECT gross_advances FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "gross_advances")."'>".mysql_result ( $data, $column, "gross_advances")."</number>";
	}
	print "</row>";
	
	print"<row>";
	print"<string>Less:Provisions</string>";
	$data = mysql_query ("SELECT less_provisions FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "less_provisions")."'>".mysql_result ( $data, $column, "less_provisions")."</number>";
	}
	print "</row>";

//finish the XML output 
print "</chart_data>";
print"<filter>
		<bevel id='data' angle='80' blurX='0' blurY='20' distance='5' highlightAlpha='40' highlightColor='ffffff' shadowColor='000000' shadowAlpha='35' type='inner' />   
		<shadow id='high' distance='2' angle='45' alpha='30' blurX='20' blurY='20' />
		<shadow id='low' distance='2' angle='45' alpha='35' blurX='5' blurY='5' />
	</filter>"
	;
print "</chart>";

?>
 