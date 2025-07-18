!function(e){
    e.fn.lightBox = function(i){
        function t(){
            return n(this, y), !1
        }
        function n(t, n){
            if (e("embed, object, select").css({
                visibility: "hidden"
            }), a(), i.imageArray.length = 0, i.activeImage = 0, 1 == n.length) 
                i.imageArray.push(new Array(t.getAttribute("href"), t.getAttribute("title")));
            else 
                for (var r = 0; r < n.length; r++) 
                    i.imageArray.push(new Array(n[r].getAttribute("href"), n[r].getAttribute("title")));
            for (; i.imageArray[i.activeImage][0] != t.getAttribute("href");) 
                i.activeImage++;
            o()
        }
        function a(){
            e("body").append('<div id="jquery-overlay"></div><div id="jquery-lightbox"><div id="lightbox-container-image-box"><div id="lightbox-container-image"><img id="lightbox-image"><div style="" id="lightbox-nav"><a href="#" id="lightbox-nav-btnPrev"></a><a href="#" id="lightbox-nav-btnNext"></a></div><div id="lightbox-loading"><a href="#" id="lightbox-loading-link"><img src="' + i.imageLoading + '"></a></div></div></div><div id="lightbox-container-image-data-box"><div id="lightbox-container-image-data"><div id="lightbox-image-details"><span id="lightbox-image-details-caption"></span><span id="lightbox-image-details-currentNumber"></span></div><div id="lightbox-secNav"><a href="#" id="lightbox-secNav-btnClose"><img src="' + i.imageBtnClose + '"></a></div></div></div></div>');
            var t = s();
            e("#jquery-overlay").css({
                backgroundColor: i.overlayBgColor,
                opacity: i.overlayOpacity,
                width: t[0],
                height: t[1]
            }).fadeIn();
            var n = v();
            e("#jquery-lightbox").css({
                top: n[1] + t[3] / 10,
                left: n[0]
            }).show(), e("#jquery-overlay,#jquery-lightbox").click(function(){
                u()
            }), e("#lightbox-loading-link,#lightbox-secNav-btnClose").click(function(){
                return u(), !1
            }), e(window).resize(function(){
                var i = s();
                e("#jquery-overlay").css({
                    width: i[0],
                    height: i[1]
                });
                var t = v();
                e("#jquery-lightbox").css({
                    top: t[1] + i[3] / 10,
                    left: t[0]
                })
            })
        }
        function o(){
            e("#lightbox-loading").show(), i.fixedNavigation ? e("#lightbox-image,#lightbox-container-image-data-box,#lightbox-image-details-currentNumber").hide() : e("#lightbox-image,#lightbox-nav,#lightbox-nav-btnPrev,#lightbox-nav-btnNext,#lightbox-container-image-data-box,#lightbox-image-details-currentNumber").hide();
            var t = new Image;
            t.onload = function(){
                e("#lightbox-image").attr("src", i.imageArray[i.activeImage][0]), r(t.width, t.height), t.onload = function(){
                }
            }, t.src = i.imageArray[i.activeImage][0]
        }
		if ($(window).width() >= 601) {
			function r(t, n){
				var a = e("#lightbox-container-image-box").width(), o = e("#lightbox-container-image-box").height(), r = t + 2 * i.containerBorderSize, c = n + 2 * i.containerBorderSize, l = a - r, d = o - c;
				e("#lightbox-container-image-box").animate({
					width: r,
					height: c
				}, i.containerResizeSpeed, function(){
					g()
				}), 0 == l && 0 == d && x(e.browser.msie ? 250 : 100), e("#lightbox-container-image-data-box").css({
					width: t
				}), e("#lightbox-nav-btnPrev,#lightbox-nav-btnNext").css({
					height: n + 2 /* i.containerBorderSize*/
				})
			}
		}else{
			function r(t, n){
				var a = e("#lightbox-container-image-box").width(), o = e("#lightbox-container-image-box").height(), r = t + 2 * i.containerBorderSize, c = n + 2 * i.containerBorderSize, l = a - r, d = o - c;
				e("#lightbox-container-image-box").animate({
					width: (r/2.4),
					height: (c/2.4)
				}, i.containerResizeSpeed, function(){
					g()
				}), 0 == l && 0 == d && x(e.browser.msie ? 250 : 100), e("#lightbox-container-image-data-box").css({
					width: (t/2.5)
				}), e("#lightbox-nav-btnPrev,#lightbox-nav-btnNext").css({
					height: n / 2
				})
			}
		}
        function g(){
            e("#lightbox-loading").hide(), e("#lightbox-image").fadeIn(function(){
                c(), l()
            }), b()
        }
        function c(){
            e("#lightbox-container-image-data-box").slideDown("fast"), e("#lightbox-image-details-caption").hide(), i.imageArray[i.activeImage][1] && e("#lightbox-image-details-caption").html(i.imageArray[i.activeImage][1]).show(), i.imageArray.length > 1 && e("#lightbox-image-details-currentNumber").html(i.txtImage + " " + (i.activeImage + 1) + " " + i.txtOf + " " + i.imageArray.length).show()
        }
		function l(){
			e("#lightbox-nav").show(), e("#lightbox-nav-btnNext").css({
				background: " url(" + i.imageBtnNext + ") right no-repeat"
			}), e("#lightbox-nav-btnPrev").css({
				background: " url(" + i.imageBtnPrev + ") left no-repeat"
			}), 0 != i.activeImage &&
			(i.fixedNavigation ? e("#lightbox-nav-btnPrev").css({
				background: "url(" + i.imageBtnPrev + ") left  no-repeat"
			}).unbind().bind("click", function(){
				return i.activeImage = i.activeImage - 1, o(), !1
			}) : e("#lightbox-nav-btnPrev").unbind().hover(function(){
				e(this).css({
					background: "url(" + i.imageBtnPrev + ") left  no-repeat"
				})
			}, function(){
				e(this).css({
					background: " url(" + i.imageBtnPrev + ") left  no-repeat"
				})
			}).show().bind("click", function(){
				return i.activeImage = i.activeImage - 1, o(), !1
			})), i.activeImage != i.imageArray.length - 1 &&
			(i.fixedNavigation ? e("#lightbox-nav-btnNext").css({
				background: "url(" + i.imageBtnNext + ") right  no-repeat"
			}).unbind().bind("click", function(){
				return i.activeImage = i.activeImage + 1, o(), !1
			}) : e("#lightbox-nav-btnNext").unbind().hover(function(){
				e(this).css({
					background: "url(" + i.imageBtnNext + ") right  no-repeat"
				})
			}, function(){
				e(this).css({
					background: " url(" + i.imageBtnNext + ") right  no-repeat"
				})
			}).show().bind("click", function(){
				return i.activeImage = i.activeImage + 1, o(), !1
			})), d()
		}
        function d(){
            e(document).keydown(function(e){
                h(e)
            })
        }
        function m(){
            e(document).unbind()
        }
        function h(e){
            null == e ? (keycode = event.keyCode, escapeKey = 27) : (keycode = e.keyCode, escapeKey = e.DOM_VK_ESCAPE), key = String.fromCharCode(keycode).toLowerCase(), (key == i.keyToClose || "x" == key || keycode == escapeKey) && u(), (key == i.keyToPrev || 37 == keycode) && 0 != i.activeImage && (i.activeImage = i.activeImage - 1, o(), m()), (key == i.keyToNext || 39 == keycode) && i.activeImage != i.imageArray.length - 1 && (i.activeImage = i.activeImage + 1, o(), m())
        }
        function b(){
            i.imageArray.length - 1 > i.activeImage && (objNext = new Image, objNext.src = i.imageArray[i.activeImage + 1][0]), i.activeImage > 0 && (objPrev = new Image, objPrev.src = i.imageArray[i.activeImage - 1][0])
        }
        function u(){
            e("#jquery-lightbox").remove(), e("#jquery-overlay").fadeOut(function(){
                e("#jquery-overlay").remove()
            }), e("embed, object, select").css({
                visibility: "visible"
            })
        }
        function s(){
            var e, i;
            window.innerHeight && window.scrollMaxY ? (e = window.innerWidth + window.scrollMaxX, i = window.innerHeight + window.scrollMaxY) : document.body.scrollHeight > document.body.offsetHeight ? (e = document.body.scrollWidth, i = document.body.scrollHeight) : (e = document.body.offsetWidth, i = document.body.offsetHeight);
            var t, n;
            return self.innerHeight ? (t = document.documentElement.clientWidth ? document.documentElement.clientWidth : self.innerWidth, n = self.innerHeight) : document.documentElement && document.documentElement.clientHeight ? (t = document.documentElement.clientWidth, n = document.documentElement.clientHeight) : document.body && (t = document.body.clientWidth, n = document.body.clientHeight), n > i ? pageHeight = n : pageHeight = i, t > e ? pageWidth = e : pageWidth = t, arrayPageSize = new Array(pageWidth, pageHeight, t, n), arrayPageSize
        }
        function v(){
            var e, i;
            return self.pageYOffset ? (i = self.pageYOffset, e = self.pageXOffset) : document.documentElement && document.documentElement.scrollTop ? (i = document.documentElement.scrollTop, e = document.documentElement.scrollLeft) : document.body && (i = document.body.scrollTop, e = document.body.scrollLeft), arrayPageScroll = new Array(e, i), arrayPageScroll
        }
        function x(e){
            var i = new Date;
            t = null;
            do 
                var t = new Date;
            while (e > t - i)
        }
        i = jQuery.extend({
            overlayBgColor: "#000",
            overlayOpacity: .8,
            fixedNavigation: !1,
            imageLoading: "lightbox/images/lightbox-ico-loading.gif",
            imageBtnPrev: "lightbox/images/lightbox-btn-prev.png",
            imageBtnNext: "lightbox/images/lightbox-btn-next.png",
            imageBtnClose: "lightbox/images/lightbox-btn-close.jpg",
            imageBlank: "lightbox/images/lightbox-blank.jpg",
            containerBorderSize: 10,
            containerResizeSpeed: 300,
            txtImage: "Imagem",
            txtOf: "de",
            keyToClose: "c",
            keyToPrev: "p",
            keyToNext: "n",
            imageArray: [],
            activeImage: 0
        }, i);
        var y = this;
        return this.unbind("click").click(t)
    }
}(jQuery);
