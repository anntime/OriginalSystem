var ajaxStandard,control_validator,dialog_info,initPop,popupBase,popup_html,reset_api_button,top_position,url_hash;url_hash=[];top_position=0;popup_html='<div id="popup-dialog" class="modal fade">\n  <div class="modal-dialog">\n        <div class="modal-content">\n            <div class="modal-header">\n                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\n                <h4 class="modal-title">Modal title</h4>\n            </div>\n            <div class="modal-body clearfix">\n                <p>One fine body&hellip;</p>\n            </div>\n            <div class="modal-info"></div>\n            <div class="modal-footer">\n                <button id=\'modal-return\' type="button" class="btn btn-default" data-dismiss="modal">取 消</button>\n                <button id="proceed" type="button" class="btn btn-primary">确 定</button>\n            </div>\n        </div><!-- /.modal-content -->\n  </div><!-- /.modal-dialog -->\n</div><!-- /.modal -->';control_validator=function(h,b,g){var e,f,d,c,a;f=$("#"+h);f.keypress(function(){dialog_info("","none");return f.removeClass("user-error")});d=$.trim(f.val());if(!(d&&d.length)){dialog_info(""+b+"不得为空！","error");f.focus();f.addClass("user-error");reset_api_button();return false}for(c=0,a=g.length;c<a;c++){e=g[c];if(d.match(e.regex)){dialog_info(""+b+e.alert,"error");f.focus();f.addClass("user-error");reset_api_button();return false}f.removeClass("user-error");dialog_info("","none")}return true};ajaxStandard=function(e,d,h,g){var f,a,c,b;if(h==null){h="GET"}if(g==null){g={}}f={rand:Math.random().toString(36).substring(7)};for(c in d){b=d[c];f[c]=b}a=$.Deferred();if(h==="POST"||h==="DELETE"||h==="PUT"){if(f.csrfmiddlewaretoken==null){g["X-CSRFToken"]=f.csrfmiddlewaretoken=$("input[name='csrfmiddlewaretoken']").attr("value")}}$.ajax({url:e,data:f,type:h,beforeSend:function(k){var j,i;i=[];for(j in g){i.push(k.setRequestHeader(j,g[j]))}return i}}).done(function(j,k,i){return a.resolve(j,k,i)}).fail(function(i){});return a.promise()};initPop=function(b){var e,g,d,a,c;c=["title","body","info"];for(d=0,a=c.length;d<a;d++){e=c[d];g="#popup-dialog .modal-"+e;$(g).html(b[e])}if(b.button_hot!=null){$("#proceed").addClass("btn-hot")}if(b.button_text!=null){$("#proceed").html(b.button_text)}if(b.title){$(".modal-header h4").html(b.title)}if(b.popName!=null){$(".modal-dialog").addClass(b.popName);$(".modal-footer").addClass("hidden")}return url_hash.push(window.location.hash)};reset_api_button=function(){return $("#proceed").removeClass("btn-disabled").addClass("btn-primary")};popupBase=function(a){var b;$("#popup-dialog").remove();if((b=$(".modal-backdrop.fade.in"))!=null){b.remove()}$("html").append(popup_html);if(a.topValue!=null){$("#popup-dialog.fade .modal-dialog").css("top",a.topValue)}$(".modal-header button.close").click(function(){var c;return(c=$(".modal-backdrop.fade.in"))!=null?c.remove():void 0});initPop(a);if(a.init!=null){a.init()}if((a.reload!=null)&&a.reload){$("#popup-dialog").on("hidden",function(){loadUrl($("#main-zone").attr("url-base")+window.location.search);return window.location.hash=url_hash.pop()})}$("#popup-dialog").modal();$("#proceed").click(function(){if($("#proceed").hasClass("btn-disabled")){return}$("#proceed").removeClass("btn-primary").addClass("btn-disabled");return a.api()});$("#modalNext").click(function(){a.next();return $(".submit-button").show()});$("#modalPrev").click(function(){return a.prev()});$('.nav-tabs a[data-toggle="tab"]').click(function(){var c;c=$(".nav-tabs li.active a").attr("href");if(c==="#system-templates"){return $(".sys-detail").html($.trim($("#os-name").html()+" "+$("#version-no").html()))}else{if(c==="#personal-templates"){if($("#personal_image_select option:checked").length===0){return $(".sys-detail").html("未创建模板")}else{return $(".sys-detail").html($("#personal_image_select option:checked").attr("os")+" "+$("#personal_image_select option:checked").attr("version"))}}}});return $("#thresholdForm").change(function(){return a.changeUnit()})};dialog_info=function(d,c,a,e){var b;if(c==null){c="success"}if(a==null){a=0}if(e==null){e=null}if(c==="error"){c="danger"}if((c!=null)&&(c==="success"||c==="warning"||c==="danger")){d="<div class='alert alert-"+c+"'>"+d+'<span id="count-down" class="text-muted"></div>'}$("#popup-dialog .modal-info").html(d);if(a>0){b=setInterval(function(){--a;return $("#count-down").html(" ("+a+"秒后关闭对话框)")},1000);return setTimeout(function(){clearInterval(b);$("#popup-dialog").modal("hide");if(e!=null){return e()}},a*1000)}};