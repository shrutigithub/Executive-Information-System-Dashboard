<?php

//connect to the database 
include 'conn.php';

//start the XML output 
print "<chart>";
print"<chart_type>line</chart_type>";
print "<chart_transition type='slide_down' delay='0' duration='3' order='series' />
<chart_pref line_thickness='5'/>
<axis_ticks value_ticks='false' category_ticks='true' />
<legend transition='slide_up' delay='2' duration='1' size='9' bullet='line'/>
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
	print"<string> Interest Accured</string>";
	$data = mysql_query ("SELECT interest_accured FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "interest_accured")."</number>";
	}
	print "</row>";
	
	
	print"<row>";
	print"<string>Interest On Loans and Advances</string>";
	$data = mysql_query ("SELECT interest_on_loans FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "interest_on_loans")."</number>";
	}
	print "</row>";
	
	print"<row>";
	print"<string>Income On Investments</string>";
	$data = mysql_query ("SELECT income_on_investments FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "income_on_investments")."</number>";
	}
	print "</row>";
	print"<row>";
	
	print"<string>Interest on balance with RBI & other Inter Bank funds</string>";
	$data = mysql_query ("SELECT interest_on_balance FROM details ORDER BY year");      
	for ( $column=0; $column < mysql_num_rows($data); $column++ ) 
	{
		print "<number>".mysql_result ( $data, $column, "interest_on_balance")."</number>";
	}
	print "</row>";
	
	

//finish the XML output 
print "</chart_data>";
print "</chart>";

?>
 