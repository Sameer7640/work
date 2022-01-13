<script>
var player;
  jQuery("#videoImg").click(function(){
  if(jQuery("#player").is("div"))
  {
    jQuery(this).hide();
    player = new YT.Player('player', {
      height: '550',
      width: '100%',
      playerVars: { 'controls': 1,'autohide':1},
      videoId: 'uJoCGoUgmj4',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
    
  }
    else {
      player.autohide=1;
      player.playVideo();
    }
    // when video ends
    function onPlayerReady(event) {
      event.target.playVideo();
    } 
      
    function onPlayerStateChange(event) {        
      if(event.data === 0) {            
        jQuery("#player").remove(); 
        jQuery("#playerContainer").append('<div id ="player" width="100%" align="left" height="auto" ></div>');
        jQuery("#videoImg").show();
      }
    }
  });

  jQuery(document).ready(function() {
    jQuery.getScript("https://www.youtube.com/iframe_api", function() {
    });
  });
</script>
<script>
var player;
  jQuery("#h4kvideo").click(function(){
  if(jQuery("#player").is("div"))
  {
    jQuery(this).hide();
    player = new YT.Player('player', {
      height: '550',
      width: '100%',
      playerVars: { 'controls': 1,'autohide':1},
      videoId: 'FbgEjfamkkU',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
    
  }
    else {
      player.autohide=1;
      player.playVideo();
    }
    // when video ends
    function onPlayerReady(event) {
      event.target.playVideo();
    } 
      
    function onPlayerStateChange(event) {        
      if(event.data === 0) {            
        jQuery("#player").remove(); 
        jQuery("#playerContainer").append('<div id ="player" width="100%" align="left" height="auto" ></div>');
        jQuery("#h4kvideo").show();
      }
    }
  });
</script>