function Hero(){
    this.setHeight = false;
    this.header = document.getElementById('header');
    this.heroElements=document.querySelectorAll('.hero-image');
    this.headline=document.querySelectorAll('#main h1')[0];

    this.elementHeights = {
        windowH: window.innerHeight-this.header.getBoundingClientRect().height
    };

    this.headlineHeight=this.headline.getBoundingClientRect().height+parseInt(window.getComputedStyle(this.headline,null).marginTop)+parseInt(window.getComputedStyle(this.headline).marginBottom,null);

    var self=this;

    setHeroSectionHeight = function () {
        if(this.setHeight){
            var windowHeight = window.innerHeight-self.header.getBoundingClientRect().height;

            for(var i=0;i<self.heroElements.length;i++){
                self.heroElements[i].style.height=(windowHeight-self.headlineHeight-5)+"px";
                i++
            }
            return true;
        }
        return false;
    };

    setHeroSectionHeight();


    window.addEventListener('scroll', function(){
      if(window.innerWidth > 480){
        var scrollElement = document.scrollingElement.scrollTop || document.body.scrollTop;
        if(scrollElement<window.innerHeight){
            var baseValue = scrollElement/window.innerHeight;
            var scaleFactor = (1+(baseValue*0.1)>1)?1+(baseValue*0.1):1;
            self.heroElements[0].style.transform = "scale("+scaleFactor+")";
            self.heroElements[0].style.opacity = 1.3-baseValue;
        }
      }
    });

    window.addEventListener("resize", function (event) {
        if(window.innerWidth > 480){
          console.log(window.innerWidth);
          setHeroSectionHeight();
        }
    })

}
