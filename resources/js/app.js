
window._ = require('lodash');

window.$ = window.jQuery = require('jquery');

!function(o,t,i,e){var h={colorbox:!0,forum:{highlightGoto:!0}};o(i).ready(function(){if(h.colorbox&&(o(i).bind("cbox_open",function(){o("body").css({overflow:"hidden"})}).bind("cbox_closed",function(){o("body").css({overflow:""})}),o(".pandaac-popup").on("click",function(t){t.preventDefault(),o(this).colorbox({maxWidth:"80%",maxHeight:"90%",closeButton:!1,title:o(this).html()})})),h.forum.highlightGoto){var n=t.location.hash;if(n!==e){n=n.replace("#","");var l=o('a[name="'+n+'"]').closest(".forum-post"),c=l.next(".forum-post-footer");l.addClass("highlight"),c.addClass("highlight"),setTimeout(function(){l.removeClass("highlight"),c.removeClass("highlight")},3500)}}})}(jQuery,window,document);