<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<?php
include("komponenter/meta.php");
?>
<body>
<?php
include("komponenter/header.html");
?>
<main>
    <article>
        <h2 style="text-align: center">Digistore AS designmanual</h2>
        <div class="designLogoContainer">
            <div>
                <img src="ikoner/LogoandTEXT.svg" alt="full logo sort tekst">
            </div>
            <div>
                <img src="ikoner/LogoandTextHvit.svg" alt="full logo hvit med tekst">
            </div>
        </div>
        <h2>Logo</h2>
        <p>Logoen finnes i to ulike farger etter hvilken flate den skal brukes på. Logoen kan enten kun være ikonet
            eller brukes med navnet Digistore AS
            Logoen skal ha minimum 20px avstand fra andre elementer eller 1/5 av høyden som avstand
        </p>
        <h2>Farger</h2>
        <div class="fargeGalleri">
            <div class="farge">
                <div id="color1">
                </div>
                <!-- klasse navnene her er ikke brukt til annent en forklare funksjonen til blocken -->
                <!-- ja disse burde vært komponenter -->
                <div class="fargeinfo">
                    <div class="separatorBetweenExplainAndCodes">
                        <div class="codes">
                            <div>
                                <p>Hex:</p>
                                <p>RGB:</p>
                                <p>CMYK:</p>
                            </div>
                            <div>
                                <p>#ffffff</p>
                                <p>255, 255, 255</p>
                                <p>0, 0, 0, 0</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="farge">
                <div id="color2">
                </div>
                <!-- klasse navnene her er ikke brukt til annent en forklare funksjonen til blocken -->
                <div class="fargeinfo">
                    <div class="separatorBetweenExplainAndCodes">
                        <div class="codes">
                            <div>
                                <p>Hex:</p>
                                <p>RGB:</p>
                                <p>CMYK:</p>
                            </div>
                            <div>
                                <p>#000000</p>
                                <p>0, 0, 0</p>
                                <p>0, 0, 0, 100</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="farge">
                <div id="color3">
                </div>
                <!-- klasse navnene her er ikke brukt til annent en forklare funksjonen til blocken -->
                <div class="fargeinfo">
                    <div class="separatorBetweenExplainAndCodes">
                        <div class="codes">
                            <div>
                                <p>Hex:</p>
                                <p>RGB:</p>
                                <p>CMYK:</p>
                            </div>
                            <div>
                                <p>#eceff1</p>
                                <p>236, 239, 241</p>
                                <p>2, 1, 0, 5</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="farge">
                <div id="color4">
                </div>
                <!-- klasse navnene her er ikke brukt til annent en forklare funksjonen til blocken -->
                <div class="fargeinfo">
                    <div class="separatorBetweenExplainAndCodes">
                        <div class="codes">
                            <div>
                                <p>Hex:</p>
                                <p>RGB:</p>
                                <p>CMYK:</p>
                            </div>
                            <div>
                                <p>#c0ddf3</p>
                                <p>192, 221, 243</p>
                                <p>21, 9, 0, 5</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="farge">
                <div id="color5">
                </div>
                <!-- klasse navnene her er ikke brukt til annent en forklare funksjonen til blocken -->
                <div class="fargeinfo">
                    <div class="separatorBetweenExplainAndCodes">
                        <div class="codes">
                            <div>
                                <p>Hex:</p>
                                <p>RGB:</p>
                                <p>CMYK:</p>
                            </div>
                            <div>
                                <p>#aa97cf</p>
                                <p>170, 151, 207</p>
                                <p>18, 27, 0, 19</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>Font</h2>
        <p>Fontet som blir brukt er Roboto. Denne skrfttypen blir brukt overalt på hele nettsiden og kan brukes på alle flater.
        Den ble valgt for det moderne utryket og enkle lesbarhet.</p>
    </article>
</main>
<?php
include("komponenter/footer.html");
?>
</body>
</html>