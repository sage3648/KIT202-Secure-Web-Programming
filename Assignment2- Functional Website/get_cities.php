<?php
//SS9 get_cities.php
    switch($_REQUEST['country'])
    {
        case "au":
        $cities = array('Please Select City', 'Adelaide', 'Brisbane', 'Canberra', 'Darwin', 'Hobart', 'Melbourne', 'Perth', 'Sydney');
        break;
        
		case "cn":
        $cities = array('Please Select City', 'Beijing', 'Chengdu', 'Dongguan', 'Guangzhou', 'Hangzhou', 'Shanghai', 'Tianjin', 'Urumqi');
        break;
        
        case "uk":
        $cities = array('Please Select City', 'Birmingham', 'Glasgow', 'Leeds', 'Liverpool', 'London', 'Manchester', 'Newcastle', 'Nottingham');
        break;

        case "us":
        $cities = array('Please Select City', 'Chicago', 'Dallas', 'Houston', 'Los Angeles', 'Miami', 'New York City', 'Philadelphia', 'Washington, D.C.');
        break;  
        
        default :
        $cities = false;
        break;
    }
    if(!$cities) echo "Please Select Country First";
    else echo "<select name='city'><option>".
            implode('</option><option>',$cities).
            '</option></select>';
?>
