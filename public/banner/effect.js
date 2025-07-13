jQuery.fn.fadeSlideShow = function(e) {
	return this.each(function() {
		settings = jQuery.extend({
			speed : "slow",
			interval : 5e3,
			PlayPauseElement : "playPause",
			PlayText : "Play",
			PauseText : "Pause",
			NextElement : "fssNext",
			NextElementText : "Next >",
			PrevElement : "fssPrev",
			PrevElementText : "< Prev",
			ListElement : "fssList",
			ListLi : "fssLi",
			ListLiActive : "fssActive",
			addListToId : !1,
			allowKeyboardCtrl : !0,
			autoplay : !0
		}, e), jQuery(this).css({
			width : settings.width,
			height : settings.height,
			position : "relative",
			overflow : "hidden"
		}), jQuery("> *", this).css({
			position : "absolute",
			width : settings.width,
			height : settings.height
		});
		var t = jQuery("> *", this).length,
		    s = t -= 1,
		    i = jQuery("> *", this),
		    n = this,
		    l = !1,
		    a = function() {
			l = setInterval(function() {
				if (i.eq(s).fadeOut(settings.speed), settings.ListElement) {
					var e = t - s + 1;
					e > t && ( e = 0), jQuery("#" + settings.ListElement + " li").removeClass(settings.ListLiActive), jQuery("#" + settings.ListElement + " li").eq(e).addClass(settings.ListLiActive)
				}
				s <= 0 ? (i.fadeIn(settings.speed),
				s =
				t) : s -= 1
			}, settings.interval), settings.PlayPauseElement && jQuery("#" + settings.PlayPauseElement).html(settings.PauseText)
		},
		    r = function() {
			clearInterval(l),
			l = !1, settings.PlayPauseElement && jQuery("#" + settings.PlayPauseElement).html(settings.PlayText)
		},
		    u = function(e) {
			e < 0 ? e = t : e > t && ( e = 0), e >= s ? jQuery("> *:lt(" + (e + 1) + ")", n).fadeIn(settings.speed) : e <= s && jQuery("> *:gt(" + e + ")", n).fadeOut(settings.speed),
			s =
			e, settings.ListElement && (jQuery("#" + settings.ListElement + " li").removeClass(settings.ListLiActive), jQuery("#" + settings.ListElement + " li").eq(t - e).addClass(settings.ListLiActive))
		};
		if (settings.ListElement) {
			for (var g = 0,
			    y = ""; g <= t; )
				y = 0 == g ? y + '<li class="' + settings.ListLi + g + " " + settings.ListLiActive + '"><a href="#">' + (g + 1) + "</a></li>" : y + '<li class="' + settings.ListLi + g + '"><a href="#">' + (g + 1) + "</a></li>", g++;
			var d = '<ul id="' + settings.ListElement + '">' + y + "</ul>";
			settings.addListToId ? jQuery("#" + settings.addListToId).append(d) : jQuery(this).after(d), jQuery("#" + settings.ListElement + " a").bind("click", function() {
				var e = jQuery("#" + settings.ListElement + " a").index(this);
				return r(), u(t - e), !1
			})
		}
		settings.PlayPauseElement && (jQuery("#" + settings.PlayPauseElement).css("display") || jQuery(this).after('<a href="#" id="' + settings.PlayPauseElement + '"></a>'), settings.autoplay ? jQuery("#" + settings.PlayPauseElement).html(settings.PauseText) : jQuery("#" + settings.PlayPauseElement).html(settings.PlayText), jQuery("#" + settings.PlayPauseElement).bind("click", function() {
			return l ? r() : a(), !1
		})), settings.NextElement && (jQuery("#" + settings.NextElement).css("display") || jQuery(this).after('<a href="#" id="' + settings.NextElement + '">' + settings.NextElementText + "</a>"), jQuery("#" + settings.NextElement).bind("click", function() {
			return nextSlide = s - 1, r(), u(nextSlide), !1
		})), settings.PrevElement && (jQuery("#" + settings.PrevElement).css("display") || jQuery(this).after('<a href="#" id="' + settings.PrevElement + '">' + settings.PrevElementText + "</a>"), jQuery("#" + settings.PrevElement).bind("click", function() {
			return prevSlide = s + 1, r(), u(prevSlide), !1
		})), settings.allowKeyboardCtrl && jQuery(document).bind("keydown", function(e) {
			if (39 == e.which) {
				var t = s - 1;
				r(), u(t)
			} else if (37 == e.which) {
				var i = s + 1;
				r(), u(i)
			} else
				32 == e.which && ( l ? r() : a())
		}), settings.autoplay ? a() : l = !1
	})
}; 