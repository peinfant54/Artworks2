/*! jQuery v1.10.2 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license
 //@ sourceMappingURL=jquery-1.10.2.min.map
 */
jQuery.fn.piscoToolTip=function(a){
    a=$.extend(
        {
            id:"piscoToolTip",
            className:"tooltip",
            position:"bottom",
            separation:10,delay:0},a
        );
    var b=function(a){};

    $(this).each(function()
        {
            $(this).hover(function()
            {
                $this=$(this);
                if(title=$this.attr("title"))
                {$this.attr("title","");b.content=$("<div id='"+a.id+"' class='"+a.className+"'><div class='cont'>"+title+"</div></div>").appendTo(document.body).hide();offset=$this.offset();height=$this.height();bubbleHeight=b.content.height();bubbleWidth=b.content.width();width=
    $this.width();switch(a.position){case "right":posX=offset.left+width+10+a.separation;posY=offset.top+height/2-bubbleHeight/2;$("#"+a.id+" .cont").before("<span class='arrow arrowLeft'></span>");break;case "left":posX=offset.left-bubbleWidth-10-a.separation;posY=offset.top+height/2-bubbleHeight/2;$("#"+a.id+" .cont").before("<span class='arrow arrowRight'></span>");break;case "top":posX=offset.left+width/2;posY=offset.top-bubbleHeight-a.separation;$("#"+a.id+" .cont").after("<span class='arrow arrowTop'></span>");
    break;default:posX=offset.left+width/2,posY=offset.top+height+a.separation,$("#"+a.id+" .cont").before("<span class='arrow arrowBottom'></span>")}b.content.css({top:posY,left:posX});b.content.show(a.delay)}},function(){$this.attr("title",title);b.content.remove()})})};