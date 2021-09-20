<?php

//connect to the database 
include 'conn.php';

//start the XML output 
print "<chart>";
print"<chart_type>line</chart_type>";
print"<chart_transition type='slide_left' delay='.5' duration='1' order='series' />
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
   <chart_label position='cursor' />";
print"<legend transition='slide_left' delay='2' duration='1' size='9' bullet='line'/>";


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
	print"<string> Net profit</string>";
	$data = mysql_query ("SELECT n_profit FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "n_profit")."'>".mysql_result ( $data, $column, "n_profit")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string> Operating profit</string>";
	$data = mysql_query ("SELECT o_profit FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "o_profit")."'>".mysql_result ( $data, $column, "o_profit")."</number>";
		
	}
	print "</row>";
	print"<row>";
	print"<string> Capital Adequancy Ratio(Basel1)</string>";
	$data = mysql_query ("SELECT basel1 FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "basel1")."'>".mysql_result ( $data, $column, "basel1")."</number>";
	}
	print "</row>";
	
	print"<row>";
	print"<string> Capital Adequancy Ratio(Basel2)</string>";
	$data = mysql_query ("SELECT basel2 FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "basel2")."'>".mysql_result ( $data, $column, "basel2")."</number>";
	}
	print "</row>";
	
	

//finish the XML output 
print "</chart_data>";
print "
<series_color>
		<color>F74373</color>
		<color>61283C</color>
		<color>5132C1</color>
		<color>286128</color>
	</series_color>
	<series bar_gap='50' set_gap='30' />";
print "</chart>";

?>
 