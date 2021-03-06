<!DOCTYPE html>
<html>
<head>
    <title></title>


<style>
/*custom font*/
@import url(http://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0;}

html {
    height: 100%;
    /*Image only BG fallback*/
background: #ffffff;
    /*background: url('http://thecodeplayer.com/uploads/media/gs.png');*/
    /*background = gradient + image pattern combo*/
    /*background: 
        linear-gradient(180deg, rgba(60,66,76,0.7) 5%,rgba(39,125,179,0.6) 10%, rgba(51,131,163,0.31948529411764708) 15%), 
    /*  url('http://thecodeplayer.com/uploads/media/gs.png');*/
}

body {
    font-family: montserrat, arial, verdana;
}
/*form styles*/
#msform {
    width: 680px;
    margin: 50px auto;
    text-align: center;
    position: relative;
}
#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 3px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 20px 30px;
    
    box-sizing: border-box;
    width: 80%;
    margin: 0 10%;
    
    /*stacking fieldsets above each other*/
    position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}
/*inputs*/
#msform input, #msform textarea {
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 10px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
}
/*buttons*/
#msform .action-button {
    width: 100px;
    background: #373c42;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 1px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #373c42;
}
/*headings*/
.fs-title {
    font-size: 15px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
}
.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}
/*progressbar*/
#coins {
    margin-top: 15px;
    margin-bottom: 15px;
    overflow: hidden;
}
#coins li {
    list-style-type: none;
    border: 0.5px solid #c9c9c9;
    border-radius: 10px;
    color: white;
    margin: 1.5px;
    padding: 12px;
    text-transform: uppercase;
    font-size: 9px;
    line-height: 50px;
    width: 27.0%;
    float: left;
    position: relative;
}
#coins li:inactive {
    display: block;
    background: white;
    border-style: solid 1px;
    margin: 0 auto 5px auto;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#coins li:hover{
    background: #e9e9e9;
}

#coins li.active{
    background: #e9e9e9;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
}
#progressbar li {
    list-style-type: none;
    color: #cccccc;
    text-transform: uppercase;
    font-size: 9px;
    width: 33.33%;
    float: left;
    position: relative;
}
#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 50px;
    line-height: 50px;
    display: block;
    font-size: 10px;
    color: #333;
    background: #cccccc;
    border-radius: 3px;
    margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #cccccc;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
    background: #373c42;
    color: white;
}




</style>
</head>
<body>
<form id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Select coin</h2>
        <h3 class="fs-subtitle"></h3>
        <ul id="coins">
        @foreach ($coins as $coin)
                <li 
                @if ($loop->first)
                @endif
                 id="{{ $coin->abbrev }}" style="float: left">
                    <a href="#" id="coin-selected"><img src="{{ $coin->image }}" width="50" height="50"/>
                        <input type="hidden" id="coin-value-hidden" value="{{ $coin->fixed_value}}">
                        <input type="hidden" id="coin-wallet-address-hidden" value="{{ $coin->wallet_address}}">
                    <span class="fs-subtitle" value="">{{ $coin->fixed_value}}</span>
                    </a>
                </li>
        @endforeach
                    <label for="coin-value" class="fs-title">Coin Value</label>
                    <input type="number" disabled name="coin-value" id="coin-value" placeholder="$00.0" value="0">
                   <label for="investiment" class="fs-title">Investment</label>
                    <input type="number" name="investiment" id="investiment" placeholder="00.01" required min="0.10" value="0.10" step="0.10">
                    <div class="alert alert-info" role="alert">...</div>
                    <label for="qtd_coins" class="fs-title">Coins</label>
                    <input type="number" name="qtd_coins" id="qtd_coins" placeholder="0.01" required min="0.10" value="0.10" step="0.10" data-decimals="3" data-format="#.00" data-spinners="false">
        </ul>
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title"></h2>
        <h3 class="fs-subtitle"></h3>
        <label for="fs-2-wallet-address" class="fs-title">Wallet</label>
        <input type="number" name="fs-2-wallet-address" id="fs-2-wallet-address" disabled required value="">
        <label for="fs-2-wallet-address" class="fs-title">Deposit ID</label>
        <input type="text" name="fs-2-deposit_id" id="fs-2-wallet-address" required value=""/>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title"></h2>
        <h3 class="fs-subtitle"></h3>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
<!--     </fieldset>
        <fieldset>
        <h2 class="fs-title"></h2>
        <h3 class="fs-subtitle"></h3>" />
        <textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
    </fieldset> -->
</form>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script type="text/javascript">
    //jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var one_price;
one_price = "{{$one_share['price']}}";

$("#investiment").change(function() {
  $vl = $("#investiment").val()/$one_price;
  $("#qtd_coins").val($vl);
});

$("#coins li").click(function(){
    console.log($(this));
    $("#coins li").removeClass("active");
    $($(this)).addClass("active");
    //$("#investiment").val($('#coin-value-hidden',$(this)).val());
    $("#coin-value").val($('#coin-value-hidden',$(this)).val());
    $("#qtd_coins").val($("#coin-value").val()*$("#investiment").val()/one_price);
    console.log($('#coin-wallet-address-hidden',$(this)).val());
    $("#fs-2-wallet-address").val($('#coin-wallet-address-hidden',$(this)).val());
});

$(".next").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50)+"%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'transform': 'scale('+scale+')'});
            next_fs.css({'left': left, 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function(){
    return false;
})

</script>
</body>
</html>


