(function() {
	// Fake loading.
	setTimeout(init, 1000);

	function init() {
		document.body.classList.remove('loading');

		if ($(window).width() >= 1024) { 

			//************************ Example 1 - reveal on load ********************************

			var color = '#CCC';

			var scrollElemToWatch_1 = document.getElementById('rev-1'),
				watcher_1 = scrollMonitor.create(scrollElemToWatch_1, -300),				
				rev1 = new RevealFx(scrollElemToWatch_1, {
					revealSettings : {
						bgcolor: color,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),
				rev2 = new RevealFx(document.querySelector('#rev-2'), {
					revealSettings : {
						bgcolor: color,
						delay: 150,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),
				rev3 = new RevealFx(document.querySelector('#rev-3'), {
					revealSettings : {
						bgcolor: color,
						direction: 'rl',
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),

				scrollElemToWatch_2 = document.getElementById('rev-4'),
				watcher_2 = scrollMonitor.create(scrollElemToWatch_2, -100),
				rev4 = new RevealFx(scrollElemToWatch_2, {
					revealSettings : {
						bgcolor: color,
						direction: 'rl',
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),
				rev5 = new RevealFx(document.querySelector('#rev-5'), {
					revealSettings : {
						bgcolor: color,
						delay: 150,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),
				rev6 = new RevealFx(document.querySelector('#rev-6'), {
					revealSettings : {
						bgcolor: color,
						delay: 200,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),
				rev7 = new RevealFx(document.querySelector('#rev-7'), {
					revealSettings : {
						bgcolor: color,
						direction: 'rl',
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),

				scrollElemToWatch_3 = document.getElementById('rev-8'),
				watcher_3 = scrollMonitor.create(scrollElemToWatch_3, -100),
				rev8 = new RevealFx(scrollElemToWatch_3, {
					revealSettings : {
						bgcolor: color,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),
				rev9 = new RevealFx(document.querySelector('#rev-9'), {
					revealSettings : {
						bgcolor: color,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				}),

				scrollElemToWatch_4 = document.getElementById('rev-10'),
				watcher_4 = scrollMonitor.create(scrollElemToWatch_4, -100),
				rev10 = new RevealFx(scrollElemToWatch_4, {
					revealSettings : {
						bgcolor: color,
						onCover: function(contentEl, revealerEl) {
							contentEl.style.opacity = 1;
						}
					}
				});

				watcher_1.enterViewport(function() {
					rev1.reveal();
					rev2.reveal();
					rev3.reveal();
					watcher_1.destroy();
				});
				watcher_2.enterViewport(function() {
					rev4.reveal();
					rev5.reveal();
					rev6.reveal();
					rev7.reveal();
					watcher_2.destroy();
				});
				watcher_3.enterViewport(function() {
					rev8.reveal();
					rev9.reveal();
					watcher_3.destroy();
				});
				watcher_4.enterViewport(function() {
					rev10.reveal();
					watcher_4.destroy();
				});
		}

	}
})();