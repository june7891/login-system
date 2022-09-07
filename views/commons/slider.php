
    
<div class="wrapper">
    <div class="arrowLeft" onclick="scrolll()"></div>
    <div class="slider">
        <div class="slide">
            <a id="campagne" href=""><img src="./images/campagne.svg" alt=""></a>
            <a id="campagne2" href=""><img src="./images/campagne-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="voiture" href=""><img src="./images/voiture.svg" alt=""></a>
            <a id="voiture2" href=""><img src="./images/voiture-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="ville" href=""><img src="./images/ville.svg" alt=""></a>
            <a id="ville2" href=""><img src="./images/ville-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="montagne" href=""><img src="./images/montagne.svg" alt=""></a>
            <a id="montagne2" href=""><img src="./images/montagne-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="foret" href=""><img src="./images/foret.svg" alt=""></a>
            <a id="foret2" href=""><img src="./images/foret-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="bus" href=""><img src="./images/bus.svg" alt=""></a>
            <a id="bus2" href=""><img src="./images/bus-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="avion" href=""><img src="./images/avion.svg" alt=""></a>
            <a id="avion2" href=""><img src="./images/avion-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="bateau" href=""><img src="./images/bateau3.svg" alt=""></a>
            <a id="bateau2" href=""><img src="./images/bateau-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="velo" href=""><img src="./images/velo.svg" alt=""></a>
            <a id="velo2" href=""><img src="./images/velo-bleu.svg" alt=""></a>
        </div>
        <div class="slide">
            <a id="camping" href=""><img src="./images/camping.svg" alt=""></a>
            <a id="camping2" href=""><img src="./images/camping-bleu.svg" alt=""></a>
        </div>
                                    
    
    </div>
    <div class="arrowRight" onclick="scrollr()"></div>
        
</div>        
    
    <script>
        function scrolll() {
    var left = document.querySelector('.slider');
    left.scrollBy(350, 0);
}
function scrollr() {
    var right = document.querySelector('.slider');
    right.scrollBy(-350, 0);
}
    </script>