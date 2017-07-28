//Accordion
jQuery(document).ready(function($) {

  //Dynamically set ID and [aria-labelledby] values for accordion and tab widget headers and panels
  var tablist = $("div[role=tablist]");

  tablist.each(function(index) {
    $(this).attr("id", "tablist-" + index);
  });

  tablist.each(function() {
    var thisset = $(this);
    var tablistid = thisset.attr("id");
// console.log (tablistid);
    var tabheaderswrap = thisset.find("ul[class=tabtitles]");
    var tabpaneldiv = thisset.find(".tabpanelwrap");

    if ( thisset.hasClass("tabs") ) { //if tablist is a horizontal tab group, then headers are list items with role=tab; otherwise, headers are h4 with role=tab
console.log(tablistid + " is a tab group");
    var tabheaders = thisset.find("li[role=tab]");
    var tabpanels = thisset.find("div[class=tabpanel-content]");
      tabheaders.eq(0).attr("aria-selected", "true"); //set first tab as selected
      tabpanels.eq(0).attr("aria-expanded", "true"); //set aria-expanded as true for first panels
      tabpanels.eq(0).attr("aria-hidden", "false"); //make first tabpanel visible
      tabheaders.appendTo($(tabheaderswrap)); //move headers into list
      tabpanels.appendTo($(tabpaneldiv)); //move panels into div

      tabheaders.each(function( index ) { //set id for each header
        var idval = tablistid + "-header-" + index;
        $(this).attr("id", idval);
        });

      tabpanels.each(function( index ) { //set aria-labelledby for each tabpanel
        var labelval = tablistid + "-header-" + index;
        $(this).attr("aria-labelledby", labelval);
        });

        var tabheaders = tablist.find("li[role=tab]");
        var tabpanels = tablist.find("div[class=tabpanel-content]");
        var tabpanelheight = tabpanels.eq(0).height();
        var tabheadersheight = tabheaders.height() + 30;
        var totalheight = tabpanelheight + tabheadersheight;
        tablist.height(totalheight);

  } else if (tablist.hasClass("adeaccordion") ) {

  console.log(tablistid + " is an accordion");

      var tabheaders = $(this).find("h4[role=tab]");
      var tabpanels = $(this).find("div[class=adeaccordion-content]");

    tabheaders.each(function( index ) { //set id for each header
      idval = tablistid + "-header-" + index;
      $(this).attr("id", idval);
      });


    tabpanels.each(function( index ) { //set aria-labelledby for each tabpanel
      var labelval = tablistid + "-header-" + index;
      $(this).attr("aria-labelledby", labelval);
      });
  }

});


  $("li[role=tab]").on("click", tabheaderclick);
  $("h4[role=tab]").on("click", tabheaderclick);

  function tabheaderclick() {
      //identify widget
      var tabgroup = $(this).closest("div[role=tablist]");
      //grab height of widget before any transformations
      var tabgroupheight = tabgroup.height();

      if ( tabgroup.hasClass("tabs") ) { //if tabgroup is a horizontal tab group, then headers are list items with role=tab; otherwise, headers are h4 with role=tab
        var thesetabheaders = tabgroup.find("li[role=tab]");
      } else {
        var thesetabheaders = tabgroup.find("h4[role=tab]");
      }
      var theseotherheaders = thesetabheaders.not($(this));

      //get id of header just clicked
      var thisid = $(this).attr("id");

      //get corresponding panel and other panels
      var panellabel = "aria-labelledby = " + thisid;
      var thispanel = tabgroup.find("div[" + panellabel + "]");
      var thispanelindex = thispanel.index();
      var otherpanel = tabgroup.find("div[role=tabpanel]").not(thispanel);

     if ( tabgroup.hasClass("tabs") ) {
        //for Horizontal Tabs, handle tab selection
        if( $(this).attr("aria-selected") == "false" ) { // if closed, select and open
          $(this).attr("aria-selected", "true");
          $(this).attr("tabindex", 0);
          thispanel.attr("aria-hidden", "false");
          thispanel.attr("aria-expanded", "true");
        } else { // if already open, do nothing

        }
        otherpanel.attr("aria-expanded", "false");
        otherpanel.attr("aria-hidden", "true");
        theseotherheaders.attr("aria-selected", "false");
        theseotherheaders.attr("tabindex", -1);
      } else {
      //for Accordions, toggle tab header's selected state & corresponding panel's expanded state
        if( $(this).attr("aria-selected") == "false" ) { // if closed, select and open
          $(this).attr("aria-selected", "true");
          $(this).attr("tabindex", 0);
          thispanel.attr("aria-hidden", "false");
          thispanel.attr("aria-expanded", "true");
        } else { // otherwise, close
          $(this).attr("aria-selected", "false");
          $(this).attr("tabindex", -1);
          thispanel.attr("aria-expanded", "false");
          thispanel.attr("aria-hidden", "true");
        }
        otherpanel.attr("aria-expanded", "false");
        otherpanel.attr("aria-hidden", "true");
        theseotherheaders.attr("aria-selected", "false");
        theseotherheaders.attr("tabindex", -1);
    }

    //reset heights appropriately
      //tabgroupheight is orgiginal height from above
      var tabgroupclass = $(tabgroup).attr("class");

      if ( tabgroupclass == "tabs") { //if the tablist for the clicked header is "tabs"
        var thesetabheaders = tabgroup.find("li[role=tab]");
        var tabheadersheight = thesetabheaders.height() + 30;
        var newpanelheight = thispanel.height();
        var oldpanelheight = tabgroupheight - tabheadersheight;
        var newheight = tabgroupheight - oldpanelheight + newpanelheight;
        $(tabgroup).height(newheight);
      }
}

  $("li[role=tab]").on("keydown", tabheaderkeydown);
  $("h4[role=tab]").on("keydown", tabheaderkeydown);

  function tabheaderkeydown( event ) {
    //identify widget
    var tabgroup = $(this).closest("div[role=tablist]");

    if ( tabgroup.hasClass("tabs") ) { //if tabgroup is a horizontal tab group, then headers are list items with role=tab; otherwise, headers are h4 with role=tab
      var thesetabheaders = tabgroup.find("li[role=tab]");
    } else {
      var thesetabheaders = tabgroup.find("h4[role=tab]");
    }

    var thisheader = $(this);
    var theseotherheaders = thesetabheaders.not(thisheader);

    //get id of header just clicked
    var thisid = $(this).attr("id");

    //get corresponding panel and other panels
    var panellabel = "aria-labelledby = " + thisid;
    var thispanel = tabgroup.find("div[" + panellabel + "]");

    //capture keyCode from event
    var k = event.keyCode || event.which;

    var indexnum = thesetabheaders.index(thisheader);

    var lastindex = $(thesetabheaders).length;
    lastindex = lastindex - 1;

    // console.log(k);
      switch (k) {
        case 9: //TAB
          if ( thispanel.attr("aria-expanded", "true")) {
            thispanel.focus(); }
            else { if (indexnum <= lastindex ){
                    $(this).next(thesetabheaders).focus();}
                  else { tabgroup.next().focus();
                    }
                  }
          break;
        case  32: //SPACE
          $(this).click();
          break;
        case  13: //ENTER
          $(this).click();
          break;
        case 39: //RIGHT
          var next = indexnum + 1;
          if (next <= lastindex ) {
            thesetabheaders.eq(next).focus();
          } else  {
            thesetabheaders.eq(0).focus();
          }
          break;
        case 40: //DOWN
          var next = indexnum + 1;
          if (next <= lastindex ) {
            thesetabheaders.eq(next).focus();
          } else  {
            thesetabheaders.eq(0).focus();
          }
          break;
        case 37: //LEFT
          var prev = indexnum - 1;
          if (prev >= 0 ) {
            thesetabheaders.eq(prev).focus();
          } else  {
            thesetabheaders.eq(0).focus();
          }
          break;
        case 38: //UP
          var prev = indexnum - 1;
          if (prev >= 0 ) {
            thesetabheaders.eq(prev).focus();
          } else  {
            thesetabheaders.eq(0).focus();
          }
          break;
        case 35: //END
          thesetabheaders.eq(lastindex).focus();
          break;
        case 36: //HOME
          thesetabheaders.eq(0).focus();
          break;
      }
    }

  //KEYBOARD NAVIGATION - ACCORDION WIDGET PANELS
   var openpanel = $("div[role=tabpanel]");// short variable for an accordion panel
   openpanel.on("keydown", function( event ) {
      var k = event.keyCode || event.which;
      var thispanel = $(this);
      var thisheaderid = thispanel.attr("aria-labelledby");
      var thisheader = $('#' + thisheaderid); //this panel's corresponding accordion header
      var thisheadertext = thisheader.text();
        switch (k) {
          case 17 && 38: // CTL + UPARROW - move focus from active panel to corresponding header
            thisheader.focus();
            break;
        }
      });

});

//    function to set / un-set aria-selected on tabs
jQuery(document).ready(function($) {
    $('.radiotab').change(function () {
        $(this).parent().find('.radiotab').each(function () {
            if (this.checked) {
                $(this).attr('aria-selected', 'true');
            } else {
                $(this).removeAttr('aria-selected');
            }
        });
    });
});

//Expand All button
jQuery(document).ready(function($) {
    $('.expand-all').click(function(){
       if ($(this).hasClass("expanded"))
          {
            $(this).removeClass("expanded");
            $('.adeaccordion-content').attr("aria-expanded", "false");
            $('.adeaccordion-content').attr("aria-hidden", "true");
            $('.adeaccordion-content').css("display", "none");
            $(this).html("Expand All");
          } else {
            $(this).addClass("expanded");
            $('.adeaccordion-content').attr("aria-expanded", "true");
            $('.adeaccordion-content').attr("aria-hidden", "false");
            $('.adeaccordion-content').css("display", "block");
            $(this).html("Collapse All");
        }
    });
  });

  //    function to set / un-set aria-selected on tabs
  jQuery(document).ready(function($) {
      $('.radiotab').change(function () {
          $(this).parent().find('.radiotab').each(function () {
              if (this.checked) {
                  $(this).attr('aria-selected', 'true');
              } else {
                  $(this).removeAttr('aria-selected');
              }
          });
      });
  });

//Modal boxes
jQuery(document).ready(function($) {
    $('.modaltarget').click(function () {
        var modalid = $(this).attr("id");
        var modalcontentid = "modalcontent_" + modalid;
        var modalcontent = document.getElementById(modalcontentid);
            if ($(modalcontent).hasClass("floatingbox")) {
                  $(".grayout").show();
            } else {}
        $(modalcontent).removeClass("modalboxview");
        $(".modalbox").not(modalcontent).addClass("modalboxview");
    });
});

jQuery(document).ready(function($) {
    $(".closex").click(function() {
        $(this).parent().addClass("modalboxview");
        $(".grayout").hide();
    });
});


//MAKE GRAVITY FORMS FORMS SPACE CORRECTLY
jQuery(document).ready(function($) {
    $(".common-logon-form").find("").remove();
    $(".common-logon-form").find(".name_first").unwrap();
    $(".common-logon-form").find(".name_last").unwrap();
});
