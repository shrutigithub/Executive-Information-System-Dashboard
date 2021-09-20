<?php

//connect to the database 
include 'conn.php';

//start the XML output 
print "<chart>
<link_data url='1.php' target='_blank' /> 
<axis_ticks value_ticks='false' category_ticks='true' /> ";
print "<chart_transition type='slide_right' delay='0' duration='3' order='series' />";
print"<legend transition='slide_left' delay='2' duration='1' size='9' bullet='circle'/>
<chart_guide horizontal='true'
                vertical='false'
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
	</series_color>
	<series bar_gap='10' set_gap='40' />
";

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
	print"<string>Cash In Hand</string>";
	$data = mysql_query ("SELECT cash_in_hand FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "cash_in_hand")."'>".mysql_result ( $data, $column, "cash_in_hand")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Balance with Reserve Bank Of India</string>";
	$data = mysql_query ("SELECT balance_rbi FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "balance_rbi")."'>".mysql_result ( $data, $column, "balance_rbi")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Balance with banks snd money at call and short notice</string>";
	$data = mysql_query ("SELECT balance_banks FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "balance_banks")."'>".mysql_result ( $data, $column, "balance_banks")."</number>";
	}
	print "</row>";
	print"<row>";
	print"<string>Fixed Assets</string>";
	$data = mysql_query ("SELECT fixed_assets FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number tooltip='".mysql_result ( $data, $column, "fixed_assets")."'>".mysql_result ( $data, $column, "fixed_assets")."</number>";
	}
	print "</row>";

//finish the XML output 
print "</chart_data>";
print "</chart>";

?>
 