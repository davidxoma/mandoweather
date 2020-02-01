<?php 
    if ( isset($_POST["mando-weather-city-name"])){
        $cityname = $_POST["mando-weather-city-name"];
      
        $api_key = get_option( 'mando-api-key' );
        // $url = 'http://api.openweathermap.org/data/2.5/weather?q=' + $cityname + '&appid=' + $api_key;
        $get_data = 'http://api.openweathermap.org/data/2.5/weather?q=' . $cityname . '&appid='.  $api_key  .'&units=metric';
        
        $data = file_get_contents($get_data);
        $response = json_decode($data);
        
        print_r($response);
       
        
    }
?>
<?php
if ( isset($_POST["mando-api-key"])){
    update_option( 'mando-api-key', $_POST["mando-api-key"] );
}
get_mando_style();
get_mando_script();
$api_key = get_option( 'mando-api-key' );

    
?>
<h1 class="h1">Mando Weather plugin Settings</h1>

<div class="mando-settings">
<div class="mando-settings-menu">
    <a href="?page=mando_settings&mandotab=about" class="about-mando <?php ismando_active_page('about'); ?>">About</a>
    <a href="?page=mando_settings&mandotab=cbadge" class="cbadge-mando <?php ismando_active_page('cbadge'); ?>">Create badge</a>
    <a href="?page=mando_settings&mandotab=apikey" class="about-mando <?php ismando_active_page('apikey'); ?>">API key</a>
</div>

<?php
    if( ismando_page('apikey')){
        $active_page = 'apikey';
        ?>
    <form method="post" action="" class="mando-apikey-form">
        <input class="mando-api-key" type="text" name="mando-api-key" placeholder="API Ky" value="<?php echo $api_key; ?>">
        <input class="mando-save-btn button button-primary" type="submit" value="SAVE">
    </form>
        <?php
    }elseif( ismando_page('cbadge')){
        $active_page = 'cbadge';
        ?>
        <div class="mando-create-badge">
            <form method="post" action="" class="mando-settings-form-cbadge">
                <input class="mando-weather-city-name" type="text" name="mando-weather-city-name" placeholder="City name" value="<?php echo $_POST["mando-weather-city-name"]; ?>">
                <input class="mando-city-btn button button-primary" type="submit" value="Check Weather">
            </form>
        </div>
        <?php
    }elseif( ismando_page('about')){
        $active_page = 'about';
        include('pages/about.php');
        
    }else{
        $active_page = 'about';
        include('pages/about.php');
    }
?>
</div>