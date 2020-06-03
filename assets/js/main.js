!function(e){"use strict";jQuery(document).on("ready",function(){function t(){e(".newsletter-form").addClass("animated shake"),setTimeout(function(){e(".newsletter-form").removeClass("animated shake")},1e3)}function i(t,i){if(t)var a="validation-success";else a="validation-danger";e("#validator-newsletter").removeClass().addClass(a).text(i)}e(window).on("scroll",function(){e(this).scrollTop()>120?e(".navbar-area").addClass("is-sticky"):e(".navbar-area").removeClass("is-sticky")}),e(".burger-menu").on("click",function(){e(".sidebar-modal").toggleClass("active")}),e(".sidebar-modal-close-btn").on("click",function(){e(".sidebar-modal").removeClass("active")}),e(".close-btn").on("click",function(){e(".search-overlay").fadeOut(),e(".search-btn").show(),e(".close-btn").removeClass("active")}),e(".search-btn").on("click",function(){e(this).hide(),e(".search-overlay").fadeIn(),e(".close-btn").addClass("active")}),jQuery(".mean-menu").meanmenu({meanScreenWidth:"991"}),e(function(){e(".default-btn").on("mouseenter",function(t){var i=e(this).offset(),a=t.pageX-i.left,n=t.pageY-i.top;e(this).find("span").css({top:n,left:a})}).on("mouseout",function(t){var i=e(this).offset(),a=t.pageX-i.left,n=t.pageY-i.top;e(this).find("span").css({top:n,left:a})})}),e(".odometer").appear(function(t){e(".odometer").each(function(){var t=e(this).attr("data-count");e(this).html(t)})}),e(".popup-btn").magnificPopup({type:"image",gallery:{enabled:!0}}),e(".projects-slides").owlCarousel({loop:!0,nav:!1,dots:!0,autoplayHoverPause:!0,autoplay:!0,margin:30,navText:["<i class='flaticon-left-chevron'></i>","<i class='flaticon-right-chevron'></i>"],responsive:{0:{items:1},576:{items:2},768:{items:2},1200:{items:3}}}),function(e){e(".tab ul.tabs").addClass("active").find("> li:eq(0)").addClass("current"),e(".tab ul.tabs li a").on("click",function(t){var i=e(this).closest(".tab"),a=e(this).closest("li").index();i.find("ul.tabs > li").removeClass("current"),e(this).closest("li").addClass("current"),i.find(".tab_content").find("div.tabs_item").not("div.tabs_item:eq("+a+")").slideUp(),i.find(".tab_content").find("div.tabs_item:eq("+a+")").slideDown(),t.preventDefault()})}(jQuery),e(".popup-youtube").magnificPopup({disableOn:320,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),e(".feedback-slides").owlCarousel({loop:!0,nav:!1,dots:!0,autoplayHoverPause:!0,autoplay:!0,navText:["<i class='flaticon-left-chevron'></i>","<i class='flaticon-right-chevron'></i>"],responsive:{0:{items:1},768:{items:2},1200:{items:3},1550:{items:4}}}),e(".partner-slides").owlCarousel({loop:!0,nav:!1,dots:!1,autoplayHoverPause:!0,autoplay:!0,margin:30,navText:["<i class='flaticon-left-chevron'></i>","<i class='flaticon-right-chevron'></i>"],responsive:{0:{items:2},576:{items:3},768:{items:4},1200:{items:5}}}),e("select").niceSelect(),e(".input-counter").each(function(){var e=jQuery(this),t=e.find('input[type="text"]'),i=e.find(".plus-btn"),a=e.find(".minus-btn"),n=t.attr("min"),s=t.attr("max");i.on("click",function(){var i=parseFloat(t.val());if(i>=s)var a=i;else a=i+1;e.find("input").val(a),e.find("input").trigger("change")}),a.on("click",function(){var i=parseFloat(t.val());if(i<=n)var a=i;else a=i-1;e.find("input").val(a),e.find("input").trigger("change")})}),e(function(){e(".accordion").find(".accordion-title").on("click",function(){e(this).toggleClass("active"),e(this).next().slideToggle("fast"),e(".accordion-content").not(e(this).next()).slideUp("fast"),e(".accordion-title").not(e(this)).removeClass("active")})}),e(".newsletter-form"),e(".newsletter-form"),e(function(){e(window).on("scroll",function(){var t=e(window).scrollTop();t>600&&e(".go-top").addClass("active"),t<600&&e(".go-top").removeClass("active")}),e(".go-top").on("click",function(){e("html, body").animate({scrollTop:"0"},500)})})}),e(window).on("load",function(){e(".wow").length&&new WOW({boxClass:"wow",animateClass:"animated",offset:20,mobile:!0,live:!0}).init()}),document.getElementById("particles-js")&&particlesJS("particles-js",{particles:{number:{value:20,density:{enable:!0,value_area:600}},color:{value:["#fbe5e5","#e9fbf7","#dbf9f2"]},shape:{type:"circle",stroke:{width:0,color:"#fff"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:30,height:30}},opacity:{value:1,random:!0,anim:{enable:!0,speed:.2,opacity_min:0,sync:!1}},size:{value:40,random:!0,anim:{enable:!0,speed:2,size_min:5,sync:!1}},line_linked:{enable:!1,distance:150,color:"#ffffff",opacity:.4,width:1},move:{enable:!0,speed:1,direction:"top",random:!0,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:600}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"bubble"},onclick:{enable:!1,mode:"repulse"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:250,size:0,duration:2,opacity:0,speed:3},repulse:{distance:400,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0});var t=function(e,t,i){this.toRotate=t,this.el=e,this.loopNum=0,this.period=parseInt(i,10)||2e3,this.txt="",this.tick(),this.isDeleting=!1};t.prototype.tick=function(){var e=this.loopNum%this.toRotate.length,t=this.toRotate[e];this.isDeleting?this.txt=t.substring(0,this.txt.length-1):this.txt=t.substring(0,this.txt.length+1),this.el.innerHTML='<span class="wrap">'+this.txt+"</span>";var i=this,a=200-100*Math.random();this.isDeleting&&(a/=2),this.isDeleting||this.txt!==t?this.isDeleting&&""===this.txt&&(this.isDeleting=!1,this.loopNum++,a=500):(a=this.period,this.isDeleting=!0),setTimeout(function(){i.tick()},a)},window.onload=function(){for(var e=document.getElementsByClassName("typewrite"),i=0;i<e.length;i++){var a=e[i].getAttribute("data-type"),n=e[i].getAttribute("data-period");a&&new t(e[i],JSON.parse(a),n)}var s=document.createElement("style");s.type="text/css",s.innerHTML=".typewrite > .wrap { border-right: 0.08em solid #fff}",document.body.appendChild(s)},e(window).on("load",function(){e(".preloader").addClass("preloader-deactivate")})}(jQuery);