$(function(){
    var current = location.pathname;
    $('.footer-prime .footer-menu li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})


 // <script>
$(function(){
    var current = location.pathname;
    $('.footer-prime .footer-menu li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href') == current){
            $this.addClass('active');
        }
    })
})