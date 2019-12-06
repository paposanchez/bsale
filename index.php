<?php
$apiKey = "543683f47809857007d7d864abe61d95";
$cityId = "3871332";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=es&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);

$currentTime = time();

?>
<?php include 'header.php' ?> 
<?php include 'content.php' ?> 
  <section class="section">
    <div class="container is-fluid">
        <div class="card">
        <article class="media">
             <div class="media-left">
                <figure class="image is-64x64"><img 
                    src="http://localhost:8888/tiempo/images/<?php echo $data->weather[0]->icon; ?>.png"
                    class="weather-icon"  />
                </figure>
            </div>
                <div class="media-content">
                    <div class="content">
                        <h1 class="level-item has-text-centered"> 
                            <strong> <?php echo $data->name; ?> </strong>
                        </h1>
                        <h2 class="level-item has-text-centered">
                            <?php echo date("l j F Y", $currentTime); ?></h1>
                        </h2>
                    </div>
                        <nav class="level">
                            <div class="level-item has-text-centered">
                                <h3><?php echo ucwords($data->weather[0]->description); ?></h3>
                            </div>
                        </nav>
                    </div>
             </article>
                <footer class="card-footer">
                    <a class="card-footer-item">Maxima: <?php echo $data->main->temp_max; ?>°C</a>
                    <a class="card-footer-item">Minima: <?php echo $data->main->temp_min; ?>°C </a>
                    <a class="card-footer-item">Nubes: <?php echo $data->clouds->all; ?></a>
                    <a class="card-footer-item">Viento: <?php echo $data->wind->speed; ?> km/h</a>
                </footer>
            </div>
        </div>
    </section>
  </body>
</html>

</html>